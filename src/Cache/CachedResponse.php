<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Cache;

use Symfony\Contracts\HttpClient\ResponseInterface;

final class CachedResponse implements ResponseInterface
{
    public function __construct(
        private readonly string $content,
        private readonly int $statusCode,
        private readonly array $headers,
    ) {
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function getHeaders(bool $throw = true): array
    {
        return $this->headers;
    }

    public function getContent(bool $throw = true): string
    {
        return $this->content;
    }

    public function toArray(bool $throw = true): array
    {
        return json_decode($this->content, true, 512, JSON_THROW_ON_ERROR);
    }

    public function cancel(): void
    {
        // Nothing to cancel for cached response
    }

    public function getInfo(?string $type = null): mixed
    {
        $info = [
            'http_code' => $this->statusCode,
            'cached' => true,
        ];

        return null === $type ? $info : ($info[$type] ?? null);
    }
}
