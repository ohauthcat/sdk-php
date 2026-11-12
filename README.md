# OhAuthCat PHP SDK

Server-side SDK for OhAuthCat enterprise SSO (SAML, OIDC) and SCIM directory sync.
PHP 8.2+, no Composer runtime dependencies (uses ext-curl when available, PHP streams otherwise).

## Install

```sh
composer require ohauthcat/ohauthcat-php:0.0.2
```


Documentation: https://docs.ohauthcat.com. Licensed under the OhAuthCat SDK Licence (see `LICENSE`); third-party notices are in `THIRD_PARTY_LICENSES`.

```php
use OhAuthCat\OhAuthCatClient;
use OhAuthCat\Webhooks;

$client = new OhAuthCatClient(getenv('OHAUTHCAT_API_KEY'), 'pk_...');

$org = $client->organizations->getOrganization('org_...');
foreach ($client->directories->listDirectoryUsersAutoPaging('dir_...', ['limit' => 100]) as $user) {
}

// Webhooks: verify the raw body before parsing.
$event = Webhooks::verify(file_get_contents('php://input'), $_SERVER['HTTP_OHAUTHCAT_SIGNATURE'] ?? null, $secret);
```

## Sign-in

Every sign-in needs a random `state` that you keep in the user's session and compare on the callback, or an attacker can sign your user into the attacker's account (login CSRF). `getAuthorizationUrl` generates one when you pass none and returns it as `$auth['state']`, with the PKCE `$auth['codeVerifier']`. Refuse a missing or different state before exchanging the code:

```php
<?php
use OhAuthCat\RestartSignInException;

const REDIRECT_URI = 'https://app.example.com/callback';

// Start: /login
session_start();
$auth = $client->ssoHelpers->getAuthorizationUrl(REDIRECT_URI, domain: 'customer.com');
$_SESSION['sso_state'] = $auth['state'];
$_SESSION['sso_verifier'] = $auth['codeVerifier'];
header('Location: ' . $auth['url'], true, 302);
exit;

// Callback: /callback
session_start();
$expected = (string) ($_SESSION['sso_state'] ?? '');
$verifier = (string) ($_SESSION['sso_verifier'] ?? '');
unset($_SESSION['sso_state'], $_SESSION['sso_verifier']);
$state = $_GET['state'] ?? '';
if ($expected === '' || $verifier === '' || !is_string($state) || !hash_equals($expected, $state)) {
    http_response_code(400); // never exchange the code
    exit;
}
try {
    $result = $client->ssoHelpers->getProfileAndToken((string) ($_GET['code'] ?? ''), $verifier, REDIRECT_URI);
    // $result->getProfile(): create your session for this user
} catch (RestartSignInException) {
    header('Location: /login', true, 302); // the code was used or expired; start again
}
```

Guests: a sign-in admitted under the organization's guest policy (an email domain outside its verified domains) has `AccessPolicy::isGuest($result->getProfile())` true (`getAccessPolicy()` is `AccessPolicy::Guest->value`); for every other sign-in the field is absent. `email_domain_verified` stays true for guests, so check this field when guests must get less access.

## Portal links

A setup link lasts `expires_in` seconds, 300 (5 minutes) to 2,592,000 (30 days); leave it out for the default of 604,800 (7 days). A link created with a secret key opens once; revoke it to end it early, and `expires_at` on the result says when it ends. `ttl` (60 to 300 seconds) is only for sealed single-use embed links; never send both.

```php
$link = $client->portal->createPortalLink(['organization' => 'org_...', 'intents' => ['sso'], 'expires_in' => 86400]);
$link->getUrl();
```

- Every v1 operation is generated from the pinned spec. Responses are typed models
  (`OhAuthCat\Models\*`, for example `$org->getName()`), validated against the spec; `toArray()` is the
  raw JSON escape hatch. Request bodies take a model or an array.
- Standby failover: after 3 consecutive edge failures the client moves to `api.oauthcat.com` /
  `auth.oauthcat.com` and re-probes the primary every 60 s, for the client's lifetime (`standby`,
  `standbyApiBaseUrl`, `standbyAuthBaseUrl`, `standbyThreshold`, `standbyCooldown`).
  Request bodies are JSON objects: pass `new \stdClass()` for an empty object nested in a body.
- Errors are `OhAuthCatException` subclasses by type (`NotFoundException`, `RateLimitedException`, ...)
  with the stable `$errorCode` (see `Generated\ErrorCodes`).
- To use a PSR-18 client such as Guzzle, install `psr/http-client`, `psr/http-factory` and the client,
  then pass `transport: new OhAuthCat\Psr18Transport($client, $factory, $factory)`. Set timeouts on the
  client itself. Any other client can implement `OhAuthCat\HttpTransport`.
- Writes carry an `Idempotency-Key` (generated, or `new RequestOptions(idempotencyKey: ...)`). GETs
  and keyed writes retry on 429/503 with backoff; the SSO code exchange is never retried.

