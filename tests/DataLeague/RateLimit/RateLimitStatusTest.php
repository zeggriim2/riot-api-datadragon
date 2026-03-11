<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\DataLeague\RateLimit;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Zeggriim\RiotApiDataDragon\DataLeague\RateLimit\RateLimitStatus;
use Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient;

/**
 * @group league
 *
 * @internal
 *
 * @coversDefaultClass \Zeggriim\RiotApiDataDragon\DataLeague\RateLimit\RateLimitStatus
 */
final class RateLimitStatusTest extends TestCase
{
    public function testFromHeaders(): void
    {
        $status = RateLimitStatus::fromHeaders([
            'x-app-rate-limit' => ['20:1,100:120'],
            'x-app-rate-limit-count' => ['18:1,95:120'],
            'x-method-rate-limit' => ['2000:60'],
            'x-method-rate-limit-count' => ['1500:60'],
        ]);

        self::assertSame('20:1,100:120', $status->appLimit);
        self::assertSame('18:1,95:120', $status->appLimitCount);
        self::assertSame('2000:60', $status->methodLimit);
        self::assertSame('1500:60', $status->methodLimitCount);
    }

    public function testFromHeadersWithMissingHeaders(): void
    {
        $status = RateLimitStatus::fromHeaders([]);

        self::assertNull($status->appLimit);
        self::assertNull($status->appLimitCount);
        self::assertNull($status->methodLimit);
        self::assertNull($status->methodLimitCount);
    }

    public function testIsNearLimitReturnsTrueWhenAboveThreshold(): void
    {
        // 18/20 = 0.90 >= 0.8
        $status = new RateLimitStatus(
            appLimit: '20:1,100:120',
            appLimitCount: '18:1,50:120',
            methodLimit: null,
            methodLimitCount: null,
        );

        self::assertTrue($status->isNearLimit(0.8));
    }

    public function testIsNearLimitReturnsFalseWhenBelowThreshold(): void
    {
        // 10/20 = 0.50, 40/100 = 0.40 → both below 0.8
        $status = new RateLimitStatus(
            appLimit: '20:1,100:120',
            appLimitCount: '10:1,40:120',
            methodLimit: null,
            methodLimitCount: null,
        );

        self::assertFalse($status->isNearLimit(0.8));
    }

    public function testIsNearLimitWithMethodLimit(): void
    {
        // app ok, but method at 1900/2000 = 0.95 >= 0.8
        $status = new RateLimitStatus(
            appLimit: '100:120',
            appLimitCount: '10:120',
            methodLimit: '2000:60',
            methodLimitCount: '1900:60',
        );

        self::assertTrue($status->isNearLimit(0.8));
    }

    public function testIsNearLimitReturnsFalseWithNullHeaders(): void
    {
        $status = new RateLimitStatus(null, null, null, null);

        self::assertFalse($status->isNearLimit());
    }

    public function testClientStoresRateLimitStatusAfterSuccessfulRequest(): void
    {
        $response = new MockResponse('{}', [
            'http_code' => 200,
            'response_headers' => [
                'X-App-Rate-Limit: 20:1,100:120',
                'X-App-Rate-Limit-Count: 5:1,10:120',
                'X-Method-Rate-Limit: 2000:60',
                'X-Method-Rate-Limit-Count: 100:60',
            ],
        ]);
        $client = new RiotApiDataLeagueClient(new MockHttpClient($response, null), 'key');

        self::assertNull($client->getLastRateLimitStatus());

        $client->get('/lol/summoner/v4/summoners/by-puuid/test');
        $status = $client->getLastRateLimitStatus();

        self::assertInstanceOf(RateLimitStatus::class, $status);
        self::assertSame('20:1,100:120', $status->appLimit);
        self::assertSame('5:1,10:120', $status->appLimitCount);
        self::assertSame('2000:60', $status->methodLimit);
        self::assertSame('100:60', $status->methodLimitCount);
        self::assertFalse($status->isNearLimit());
    }

    public function testClientDoesNotUpdateStatusOnError(): void
    {
        $successResponse = new MockResponse('{}', [
            'http_code' => 200,
            'response_headers' => [
                'X-App-Rate-Limit: 20:1',
                'X-App-Rate-Limit-Count: 5:1',
            ],
        ]);
        $errorResponse = new MockResponse('', ['http_code' => 429]);

        $client = new RiotApiDataLeagueClient(
            new MockHttpClient([$successResponse, $errorResponse], null),
            'key'
        );

        $client->get('/lol/summoner/v4/summoners/by-puuid/first');
        $statusAfterSuccess = $client->getLastRateLimitStatus();

        try {
            $client->get('/lol/summoner/v4/summoners/by-puuid/second');
        } catch (\Throwable) {
        }

        // Status must not have changed after the 429
        self::assertSame($statusAfterSuccess, $client->getLastRateLimitStatus());
    }
}
