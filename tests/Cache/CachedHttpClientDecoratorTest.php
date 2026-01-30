<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Cache;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Zeggriim\RiotApiDataDragon\Cache\CachedHttpClientDecorator;
use Zeggriim\RiotApiDataDragon\Cache\CachedResponse;

/**
 * @group cache
 *
 * @internal
 *
 * @coversDefaultClass \Zeggriim\RiotApiDataDragon\Cache\CachedHttpClientDecorator
 */
final class CachedHttpClientDecoratorTest extends TestCase
{
    public function testGetRequestIsCached(): void
    {
        $responseBody = json_encode(['version' => '14.1.1'], JSON_THROW_ON_ERROR);
        $callCount = 0;

        $mockClient = new MockHttpClient(static function () use ($responseBody, &$callCount): MockResponse {
            ++$callCount;

            return new MockResponse($responseBody);
        });

        $cache = new ArrayAdapter();
        $cachedClient = new CachedHttpClientDecorator($mockClient, $cache, 3600);

        // First call - should hit the real client
        $response1 = $cachedClient->request('GET', '/api/versions.json');
        self::assertSame($responseBody, $response1->getContent());
        self::assertSame(1, $callCount);

        // Second call - should be cached
        $response2 = $cachedClient->request('GET', '/api/versions.json');
        self::assertSame($responseBody, $response2->getContent());
        self::assertSame(1, $callCount); // Still 1, because it was cached
    }

    public function testPostRequestIsNotCached(): void
    {
        $responseBody = json_encode(['success' => true], JSON_THROW_ON_ERROR);
        $callCount = 0;

        $mockClient = new MockHttpClient(static function () use ($responseBody, &$callCount): MockResponse {
            ++$callCount;

            return new MockResponse($responseBody);
        });

        $cache = new ArrayAdapter();
        $cachedClient = new CachedHttpClientDecorator($mockClient, $cache, 3600);

        // First call
        $cachedClient->request('POST', '/api/action');
        self::assertSame(1, $callCount);

        // Second call - should NOT be cached
        $cachedClient->request('POST', '/api/action');
        self::assertSame(2, $callCount);
    }

    public function testDifferentUrlsAreCachedSeparately(): void
    {
        $mockClient = new MockHttpClient([
            new MockResponse(json_encode(['url' => 'first'], JSON_THROW_ON_ERROR)),
            new MockResponse(json_encode(['url' => 'second'], JSON_THROW_ON_ERROR)),
        ]);

        $cache = new ArrayAdapter();
        $cachedClient = new CachedHttpClientDecorator($mockClient, $cache, 3600);

        $response1 = $cachedClient->request('GET', '/api/first');
        $response2 = $cachedClient->request('GET', '/api/second');

        self::assertSame(['url' => 'first'], $response1->toArray());
        self::assertSame(['url' => 'second'], $response2->toArray());
    }

    public function testCachedResponseReturnsCachedFlag(): void
    {
        $mockClient = new MockHttpClient([
            new MockResponse(json_encode(['data' => 'test'], JSON_THROW_ON_ERROR)),
        ]);

        $cache = new ArrayAdapter();
        $cachedClient = new CachedHttpClientDecorator($mockClient, $cache, 3600);

        // First call
        $cachedClient->request('GET', '/api/test');

        // Second call - get from cache
        $cachedResponse = $cachedClient->request('GET', '/api/test');

        self::assertInstanceOf(CachedResponse::class, $cachedResponse);
        self::assertTrue($cachedResponse->getInfo('cached'));
    }

    public function testCustomTtlCanBePassedInOptions(): void
    {
        $mockClient = new MockHttpClient([
            new MockResponse(json_encode(['data' => 'test'], JSON_THROW_ON_ERROR)),
        ]);

        $cache = new ArrayAdapter();
        $cachedClient = new CachedHttpClientDecorator($mockClient, $cache, 3600);

        // Request with custom TTL
        $response = $cachedClient->request('GET', '/api/test', ['cache_ttl' => 60]);

        self::assertInstanceOf(CachedResponse::class, $response);
    }

    public function testWithOptionsReturnsNewInstance(): void
    {
        $mockClient = new MockHttpClient();
        $cache = new ArrayAdapter();
        $cachedClient = new CachedHttpClientDecorator($mockClient, $cache, 3600);

        $newClient = $cachedClient->withOptions(['base_uri' => 'https://example.com']);

        self::assertInstanceOf(CachedHttpClientDecorator::class, $newClient);
        self::assertNotSame($cachedClient, $newClient);
    }
}
