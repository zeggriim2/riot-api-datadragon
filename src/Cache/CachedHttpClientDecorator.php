<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Cache;

use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Symfony\Contracts\HttpClient\ResponseStreamInterface;

final class CachedHttpClientDecorator implements HttpClientInterface
{
    private const DEFAULT_TTL = 3600; // 1 hour

    public function __construct(
        private readonly HttpClientInterface $decorated,
        private readonly CacheInterface $cache,
        private readonly int $defaultTtl = self::DEFAULT_TTL,
    ) {
    }

    public function request(string $method, string $url, array $options = []): ResponseInterface
    {
        // Only cache GET requests
        if ('GET' !== $method) {
            return $this->decorated->request($method, $url, $options);
        }

        $cacheKey = $this->generateCacheKey($method, $url, $options);
        $ttl = $options['cache_ttl'] ?? $this->defaultTtl;

        // Remove custom option before passing to decorated client
        unset($options['cache_ttl']);

        return $this->cache->get($cacheKey, function (ItemInterface $item) use ($method, $url, $options, $ttl): CachedResponse {
            $item->expiresAfter($ttl);

            $response = $this->decorated->request($method, $url, $options);

            return new CachedResponse(
                content: $response->getContent(),
                statusCode: $response->getStatusCode(),
                headers: $response->getHeaders(false),
            );
        });
    }

    public function stream(ResponseInterface|iterable $responses, ?float $timeout = null): ResponseStreamInterface
    {
        return $this->decorated->stream($responses, $timeout);
    }

    public function withOptions(array $options): static
    {
        return new self(
            $this->decorated->withOptions($options),
            $this->cache,
            $this->defaultTtl,
        );
    }

    private function generateCacheKey(string $method, string $url, array $options): string
    {
        $keyData = [
            'method' => $method,
            'url' => $url,
            'query' => $options['query'] ?? [],
        ];

        return 'riot_api_'.hash('xxh128', serialize($keyData));
    }
}
