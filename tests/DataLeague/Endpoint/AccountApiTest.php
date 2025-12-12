<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\DataLeague\Endpoint;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpClient\Exception\ClientException;
use Symfony\Component\HttpClient\Exception\ServerException as ServerExceptionHttpClient;
use Symfony\Component\HttpFoundation\Response;
use Zeggriim\RiotApiDataDragon\Exception\DataNotFoundException;
use Zeggriim\RiotApiDataDragon\Exception\ForbiddenException;
use Zeggriim\RiotApiDataDragon\Exception\RequestException;
use Zeggriim\RiotApiDataDragon\Exception\ServerException;
use Zeggriim\RiotApiDataDragon\Exception\ServerLimitException;
use Zeggriim\RiotApiDataDragon\Exception\UnauthorizedException;
use Zeggriim\RiotApiDataDragon\Exception\UnsupportedMediaTypeException;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataLeagueTrait;

/**
 * @group league
 *
 * @internal
 *
 * @coversDefaultClass \Zeggriim\RiotApiDataDragon\DataLeague\endpoint\AccountApi
 */
final class AccountApiTest extends KernelTestCase
{
    use RiotApiDataLeagueTrait;

    public function testGetAccountByPuuid(): void
    {
        $dataResponse = [
            'puuid' => 'test-puuid-12345',
            'gameName' => 'TestPlayer',
            'tagLine' => 'EUW',
        ];

        $accountApi = $this->getAccountApi($dataResponse);
        $account = $accountApi->getAccountByPuuid('test-puuid-12345');

        self::assertArrayHasKey('puuid', $account);
        self::assertArrayHasKey('gameName', $account);
        self::assertArrayHasKey('tagLine', $account);
        self::assertSame('test-puuid-12345', $account['puuid']);
        self::assertSame('TestPlayer', $account['gameName']);
        self::assertSame('EUW', $account['tagLine']);
    }

    public function testGetAccountByRiotId(): void
    {
        $dataResponse = [
            'puuid' => 'test-puuid-67890',
            'gameName' => 'AnotherPlayer',
            'tagLine' => 'NA1',
        ];

        $accountApi = $this->getAccountApi($dataResponse, ['http_code' => 200]);
        $account = $accountApi->getAccountByRiotId('AnotherPlayer', 'NA1');

        self::assertArrayHasKey('puuid', $account);
        self::assertArrayHasKey('gameName', $account);
        self::assertArrayHasKey('tagLine', $account);
        self::assertSame('test-puuid-67890', $account['puuid']);
        self::assertSame('AnotherPlayer', $account['gameName']);
        self::assertSame('NA1', $account['tagLine']);
    }

    public function testGetAccountByAccessToken(): void
    {
        $dataResponse = [
            'puuid' => 'oauth-puuid-token',
            'gameName' => 'OAuthUser',
            'tagLine' => 'KR',
        ];

        $accountApi = $this->getAccountApi($dataResponse);
        $account = $accountApi->getAccountByAccessToken();

        self::assertArrayHasKey('puuid', $account);
        self::assertArrayHasKey('gameName', $account);
        self::assertArrayHasKey('tagLine', $account);
        self::assertSame('oauth-puuid-token', $account['puuid']);
        self::assertSame('OAuthUser', $account['gameName']);
        self::assertSame('KR', $account['tagLine']);
    }

    /**
     * @dataProvider provideGetBadRequestCases
     *
     * @param class-string<\Throwable> $exceptionClass
     */
    public function testGetBadRequest(int $codeStatus, string $exceptionClass, string $exceptionMessage): void
    {
        $accountApi = $this->getAccountApi(['test' => 'test'], ['http_code' => $codeStatus]);
        self::expectException($exceptionClass);
        self::expectExceptionMessage($exceptionMessage);
        $res = $accountApi->getAccountByPuuid('test-puuid');
        self::assertCount(0, $res);
    }

    public static function provideGetBadRequestCases(): iterable
    {
        return [
            [Response::HTTP_BAD_REQUEST, RequestException::class, 'LeagueAPI: Request is invalid'],
            [Response::HTTP_UNAUTHORIZED, UnauthorizedException::class, 'LeagueAPI: Unauthorized request.'],
            [Response::HTTP_FORBIDDEN, ForbiddenException::class, 'LeagueAPI: Forbidden.'],
            [Response::HTTP_NOT_FOUND, DataNotFoundException::class, 'LeagueAPI: Data not found'],
            [Response::HTTP_UNSUPPORTED_MEDIA_TYPE, UnsupportedMediaTypeException::class, 'LeagueAPI: Unsupported media type'],
            [Response::HTTP_NOT_ACCEPTABLE, ClientException::class, 'HTTP 406 returned for "https://europe.api.riotgames.com/riot/account/v1/accounts/by-puuid/test-puuid"'],
            [Response::HTTP_TOO_MANY_REQUESTS, ServerLimitException::class, 'LeagueAPI: Rate limit exceeded request.'],
            [Response::HTTP_INTERNAL_SERVER_ERROR, ServerException::class, 'LeagueAPI: Internal server error occured.'],
            [Response::HTTP_SERVICE_UNAVAILABLE, ServerException::class, 'LeagueAPI: Service is temporarily unavailable.'],
            [Response::HTTP_GATEWAY_TIMEOUT, ServerExceptionHttpClient::class, 'HTTP 504 returned for "https://europe.api.riotgames.com/riot/account/v1/accounts/by-puuid/test-puuid".'],
        ];
    }
}
