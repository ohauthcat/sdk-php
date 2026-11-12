<?php

declare(strict_types=1);

namespace OhAuthCat;

/** Sends one HTTP exchange. Implement it to plug in your own client (for example a PSR-18 one). */
interface HttpTransport
{
    /**
     * @param array<string, string> $headers
     * @throws TransportException
     */
    public function send(string $method, string $url, array $headers, ?string $body, float $timeout): HttpResponse;
}
