<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\DataLeague;

use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Zeggriim\RiotApiDataDragon\Enum\Platform;
use Zeggriim\RiotApiDataDragon\Exception\ServerLimitException;
use Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient;

/**
 * @group league
 *
 * @internal
 *
 * @coversDefaultClass \Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient
 */
final class RiotApiDataLeagueClientTest extends TestCase
{
    public function test429WithRetryAfterAndLimitType(): void
    {
        $response = new MockResponse('', [
            'http_code' => 429,
            'response_headers' => [
                'Retry-After: 5',
                'X-Rate-Limit-Type: application',
            ],
        ]);
        $client = new RiotApiDataLeagueClient(new MockHttpClient($response, null), 'key');

        try {
            $client->get('/lol/summoner/v4/summoners/by-puuid/test', Platform::EUW1);
            self::fail('ServerLimitException expected');
        } catch (ServerLimitException $e) {
            self::assertSame(429, $e->getCode());
            self::assertSame(5, $e->retryAfter);
            self::assertSame('application', $e->limitType);
            self::assertStringContainsString('Rate limit exceeded', $e->getMessage());
            self::assertFalse($e->isOtherLimit());
        }
    }

    public function test429WithoutLimitTypeIsOtherLimit(): void
    {
        $response = new MockResponse('', [
            'http_code' => 429,
            'response_headers' => [
                'Retry-After: 2',
            ],
        ]);
        $client = new RiotApiDataLeagueClient(new MockHttpClient($response, null), 'key');

        try {
            $client->get('/lol/summoner/v4/summoners/by-puuid/test', Platform::EUW1);
            self::fail('ServerLimitException expected');
        } catch (ServerLimitException $e) {
            self::assertSame(429, $e->getCode());
            self::assertSame(2, $e->retryAfter);
            self::assertNull($e->limitType);
            self::assertTrue($e->isOtherLimit());
        }
    }

    public function test429WithNoHeadersAtAll(): void
    {
        $response = new MockResponse('', [
            'http_code' => 429,
        ]);
        $client = new RiotApiDataLeagueClient(new MockHttpClient($response, null), 'key');

        try {
            $client->get('/lol/summoner/v4/summoners/by-puuid/test', Platform::EUW1);
            self::fail('ServerLimitException expected');
        } catch (ServerLimitException $e) {
            self::assertSame(429, $e->getCode());
            self::assertNull($e->retryAfter);
            self::assertNull($e->limitType);
            self::assertTrue($e->isOtherLimit());
        }
    }

    public function test429WithMethodLimitType(): void
    {
        $response = new MockResponse('', [
            'http_code' => 429,
            'response_headers' => [
                'Retry-After: 10',
                'X-Rate-Limit-Type: method',
            ],
        ]);
        $client = new RiotApiDataLeagueClient(new MockHttpClient($response, null), 'key');

        try {
            $client->get('/lol/summoner/v4/summoners/by-puuid/test', Platform::EUW1);
            self::fail('ServerLimitException expected');
        } catch (ServerLimitException $e) {
            self::assertSame(10, $e->retryAfter);
            self::assertSame('method', $e->limitType);
            self::assertFalse($e->isOtherLimit());
        }
    }
}
