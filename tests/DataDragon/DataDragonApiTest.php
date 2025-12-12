<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\DataDragon;

use PHPUnit\Framework\TestCase;
use Zeggriim\RiotApiDataDragon\DataDragon\DataDragonApi;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\ChampionApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\ItemApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\LanguageApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\ProfileIconApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\SummonerApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\VersionApiInterface;

/**
 * @internal
 *
 * @coversDefaultClass \Zeggriim\RiotApiDataDragon\DataDragon\DataDragonApi
 */
final class DataDragonApiTest extends TestCase
{
    public function testAccessorsReturnInjectedApis(): void
    {
        $versionApi = $this->createMock(VersionApiInterface::class);
        $itemApi = $this->createMock(ItemApiInterface::class);
        $championApi = $this->createMock(ChampionApiInterface::class);
        $languageApi = $this->createMock(LanguageApiInterface::class);
        $profileIconApi = $this->createMock(ProfileIconApiInterface::class);
        $summonerApi = $this->createMock(SummonerApiInterface::class);

        $facade = new DataDragonApi(
            $versionApi,
            $itemApi,
            $championApi,
            $languageApi,
            $profileIconApi,
            $summonerApi
        );

        self::assertSame($versionApi, $facade->versions(), 'versions() doit retourner l’instance injectée');
        self::assertSame($itemApi, $facade->items(), 'items() doit retourner l’instance injectée');
        self::assertSame($championApi, $facade->champions(), 'champions() doit retourner l’instance injectée');
        self::assertSame($languageApi, $facade->languages(), 'languages() doit retourner l’instance injectée');
        self::assertSame($profileIconApi, $facade->profileIcons(), 'profileIcons() doit retourner l’instance injectée');
        self::assertSame($summonerApi, $facade->summoners(), 'summoners() doit retourner l’instance injectée');
    }

    public function testTypesReturnedMatchInterfaces(): void
    {
        $facade = new DataDragonApi(
            $this->createMock(VersionApiInterface::class),
            $this->createMock(ItemApiInterface::class),
            $this->createMock(ChampionApiInterface::class),
            $this->createMock(LanguageApiInterface::class),
            $this->createMock(ProfileIconApiInterface::class),
            $this->createMock(SummonerApiInterface::class)
        );

        self::assertInstanceOf(VersionApiInterface::class, $facade->versions());
        self::assertInstanceOf(ItemApiInterface::class, $facade->items());
        self::assertInstanceOf(ChampionApiInterface::class, $facade->champions());
        self::assertInstanceOf(LanguageApiInterface::class, $facade->languages());
        self::assertInstanceOf(ProfileIconApiInterface::class, $facade->profileIcons());
        self::assertInstanceOf(SummonerApiInterface::class, $facade->summoners());
    }
}
