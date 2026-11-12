<?php

declare(strict_types=1);

namespace OhAuthCat;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * Optional adapter for any PSR-18 HTTP client (for example Guzzle). Requires psr/http-client and
 * psr/http-factory, which this SDK only suggests. PSR-18 has no per-request timeout: configure
 * timeouts on your client (Guzzle: `new Client(['timeout' => 30])`) and disable redirects.
 */
final class Psr18Transport implements HttpTransport
{
    public function __construct(
        private readonly ClientInterface $client,
        private readonly RequestFactoryInterface $requestFactory,
        private readonly StreamFactoryInterface $streamFactory,
    ) {
    }

    public function send(string $method, string $url, array $headers, ?string $body, float $timeout): HttpResponse
    {
        $request = $this->requestFactory->createRequest($method, $url);
        foreach ($headers as $name => $value) {
            $request = $request->withHeader($name, $value);
        }
        if ($body !== null) {
            $request = $request->withBody($this->streamFactory->createStream($body));
        }
        try {
            $response = $this->client->sendRequest($request);
        } catch (ClientExceptionInterface $e) {
            throw new TransportException('request failed');
        }
        $received = [];
        foreach ($response->getHeaders() as $name => $values) {
            $received[(string) $name] = implode(', ', $values);
        }
        return new HttpResponse($response->getStatusCode(), $received, (string) $response->getBody());
    }
}
