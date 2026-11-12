<?php

declare(strict_types=1);

namespace OhAuthCat;

/** Default transport: ext-curl when loaded, otherwise PHP HTTP streams. Never follows redirects. */
final class StreamTransport implements HttpTransport
{
    public function send(string $method, string $url, array $headers, ?string $body, float $timeout): HttpResponse
    {
        return \function_exists('curl_init')
            ? $this->curl($method, $url, $headers, $body, $timeout)
            : $this->stream($method, $url, $headers, $body, $timeout);
    }

    /** @param array<string, string> $headers */
    private function curl(string $method, string $url, array $headers, ?string $body, float $timeout): HttpResponse
    {
        $handle = curl_init($url);
        if ($handle === false) {
            throw new TransportException('curl_init failed');
        }
        $lines = [];
        foreach ($headers as $name => $value) {
            $lines[] = $name . ': ' . $value;
        }
        $received = [];
        curl_setopt_array($handle, [
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $lines,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => false,
            CURLOPT_TIMEOUT_MS => (int) ceil($timeout * 1000),
            CURLOPT_CONNECTTIMEOUT_MS => (int) ceil(min($timeout, 10.0) * 1000),
            CURLOPT_PROTOCOLS => CURLPROTO_HTTP | CURLPROTO_HTTPS,
            CURLOPT_HEADERFUNCTION => static function ($curl, string $line) use (&$received): int {
                $parts = explode(':', $line, 2);
                if (\count($parts) === 2) {
                    $received[trim($parts[0])] = trim($parts[1]);
                }
                return \strlen($line);
            },
        ]);
        if ($body !== null) {
            curl_setopt($handle, CURLOPT_POSTFIELDS, $body);
        }
        $result = curl_exec($handle);
        if ($result === false) {
            $timedOut = curl_errno($handle) === CURLE_OPERATION_TIMEDOUT;
            throw new TransportException('request failed', $timedOut);
        }
        $status = (int) curl_getinfo($handle, CURLINFO_RESPONSE_CODE);
        return new HttpResponse($status, $received, \is_string($result) ? $result : '');
    }

    /** @param array<string, string> $headers */
    private function stream(string $method, string $url, array $headers, ?string $body, float $timeout): HttpResponse
    {
        $lines = '';
        foreach ($headers as $name => $value) {
            $lines .= $name . ': ' . $value . "\r\n";
        }
        $context = stream_context_create(['http' => [
            'method' => $method,
            'header' => $lines,
            'content' => $body ?? '',
            'timeout' => $timeout,
            'ignore_errors' => true,
            'follow_location' => 0,
            'max_redirects' => 0,
        ]]);
        $result = @file_get_contents($url, false, $context);
        $responseHeaders = \function_exists('http_get_last_response_headers') ? (http_get_last_response_headers() ?? []) : [];
        if ($result === false || $responseHeaders === []) {
            throw new TransportException('request failed');
        }
        $status = 0;
        $received = [];
        foreach ($responseHeaders as $line) {
            if (preg_match('#^HTTP/\S+\s+(\d{3})#', $line, $m) === 1) {
                $status = (int) $m[1];
                $received = [];
                continue;
            }
            $parts = explode(':', $line, 2);
            if (\count($parts) === 2) {
                $received[trim($parts[0])] = trim($parts[1]);
            }
        }
        return new HttpResponse($status, $received, $result);
    }
}
