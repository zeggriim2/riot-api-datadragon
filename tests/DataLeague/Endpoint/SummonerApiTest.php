<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\DataLeague\Endpoint;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zeggriim\RiotApiDataDragon\Enum\Platform;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataLeagueTrait;

/**
 * @group league
 *
 * @internal
 *
 * @coversDefaultClass \Zeggriim\RiotApiDataDragon\DataLeague\Endpoint\SummonerApi
 */
final class SummonerApiTest extends KernelTestCase
{
    use RiotApiDataLeagueTrait;

    public function testGetSummoner(): void
    {
        $dataResponse = [
            'puuid' => 'test-puuid-12345',
            'profileIconId' => 5435,
            'revisionDate' => 1769639510208,
            'summonerLevel' => 469,
        ];

        $summonerApi = $this->getSummonerApi($dataResponse);
        $summoner = $summonerApi->getSummoner('test-puuid-12345', Platform::EUW1);

        self::assertArrayHasKey('puuid', $summoner);
        self::assertSame($dataResponse['puuid'], $summoner['puuid']);
        self::assertArrayHasKey('profileIconId', $summoner);
        self::assertSame($dataResponse['profileIconId'], $summoner['profileIconId']);
        self::assertArrayHasKey('revisionDate', $summoner);
        self::assertSame($dataResponse['revisionDate'], $summoner['revisionDate']);
        self::assertArrayHasKey('summonerLevel', $summoner);
        self::assertSame($dataResponse['summonerLevel'], $summoner['summonerLevel']);
    }

    public function testGetSummonerWithDefaultPlatform(): void
    {
        $dataResponse = [
            'puuid' => 'test-puuid-12345',
            'profileIconId' => 5435,
            'revisionDate' => 1769639510208,
            'summonerLevel' => 469,
        ];

        $summonerApi = $this->getSummonerApi($dataResponse);
        $summoner = $summonerApi->getSummoner('test-puuid-12345');

        self::assertArrayHasKey('puuid', $summoner);
        self::assertSame($dataResponse['puuid'], $summoner['puuid']);
    }

    public function testGetSummonerAsObject(): void
    {
        $dataResponse = [
            'puuid' => 'test-puuid-12345',
            'profileIconId' => 5435,
            'revisionDate' => 1769639510208,
            'summonerLevel' => 469,
        ];

        $summonerApi = $this->getSummonerApi($dataResponse);
        $summoner = $summonerApi->getSummonerAsObject('test-puuid-12345', Platform::EUW1);

        self::assertSame($dataResponse['puuid'], $summoner->puuid);
        self::assertSame($dataResponse['profileIconId'], $summoner->profileIconId);
        self::assertSame($dataResponse['revisionDate'], $summoner->revisionDate);
        self::assertSame($dataResponse['summonerLevel'], $summoner->summonerLevel);
    }
}
