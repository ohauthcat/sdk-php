<?php

declare(strict_types=1);

namespace OhAuthCat;

/** Webhook verification failed; $reason never contains secrets, headers or the body. */
final class WebhookVerificationException extends \RuntimeException
{
    public function __construct(public readonly string $reason)
    {
        parent::__construct('Webhook verification failed: ' . $reason);
    }
}
