<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Tests\DataDragonApi;

use Zeggriim\RiotApiDatadragon\DataDragonApi;
use Zeggriim\RiotApiDatadragon\Exception\EmptyArgument;
use Zeggriim\RiotApiDatadragon\Model\Summoner\SummonerData;
use Zeggriim\RiotApiDatadragon\Model\Summoner\SummonerMetadata;
use Zeggriim\RiotApiDatadragon\Model\Summoner\Summoners;
use Zeggriim\RiotApiDatadragon\Tests\BaseApiTest;
use Zeggriim\RiotApiDatadragon\Tests\Traits\AssertImageTrait;

class SummonerApiTest extends BaseApiTest
{
    use AssertImageTrait;

    public function testGetSummonersNullVersion()
    {
        $api = new DataDragonApi(lang: 'fr_FR');
        $this->expectException(EmptyArgument::class);
        $api->getSummoner();
    }

    public function testGetSummonersNullLang()
    {
        $api = new DataDragonApi(version: '13.1.1');
        $this->expectException(EmptyArgument::class);
        $api->getSummoner();
    }

    public function testGetSummoner()
    {
        $summoners = $this->dataDragonApiVerionAndLanguages->getSummoner();
        $this->assertInstanceOf(SummonerMetadata::class, $summoners);
        $this->assertSummonerMetadata($summoners);

    }

    private function assertSummonerMetadata(SummonerMetadata $summonerMetadata)
    {
        $this->assertIsString($summonerMetadata->getType());
        $this->assertIsString($summonerMetadata->getVersion());
        $this->assertSummoners($summonerMetadata->getData());
    }

    private function assertSummoners(Summoners $summoners)
    {
        $this->assertSummonerData($summoners->getSummonerBarrier());
        $this->assertSummonerData($summoners->getSummonerBoost());
        $this->assertSummonerData($summoners->getSummonerDot());
        $this->assertSummonerData($summoners->getSummonerExhaust());
        $this->assertSummonerData($summoners->getSummonerFlash());
        $this->assertSummonerData($summoners->getSummonerHaste());
        $this->assertSummonerData($summoners->getSummonerHeal());
        $this->assertSummonerData($summoners->getSummonerMana());
        $this->assertSummonerData($summoners->getSummonerPoroRecall());
        $this->assertSummonerData($summoners->getSummonerPoroThrow());
        $this->assertSummonerData($summoners->getSummonerSmite());
        $this->assertSummonerData($summoners->getSummonerSnowURFSnowballMark());
        $this->assertSummonerData($summoners->getSummonerSnowball());
        $this->assertSummonerData($summoners->getSummonerTeleport());
        $this->assertSummonerData($summoners->getSummonerUltBookPlaceholder());
        $this->assertSummonerData($summoners->getSummonerUltBookSmitePlaceholder());
    }

    private function assertSummonerData(SummonerData $summoner): void
    {
        $this->assertIsString($summoner->getId());
        $this->assertIsString($summoner->getName());
        $this->assertIsString($summoner->getDescription());
        $this->assertIsString($summoner->getTooltip());
        $this->assertIsInt($summoner->getMaxrank());
        $this->assertIsArray($summoner->getCooldown());
        $this->assertIsString($summoner->getCooldownBurn());
        $this->assertIsArray($summoner->getCost());
        $this->assertIsString($summoner->getCostBurn());
        $this->assertIsArray($summoner->getDatavalues());
        $this->assertIsArray($summoner->getEffect());
        $this->assertIsArray($summoner->getEffectBurn());
        $this->assertIsArray($summoner->getVars());
        $this->assertIsString($summoner->getKey());
        $this->assertIsInt($summoner->getSummonerLevel());
        $this->assertIsArray($summoner->getModes());
        $this->assertIsString($summoner->getCostType());
        $this->assertIsString($summoner->getMaxammo());
        $this->assertIsArray($summoner->getRange());
        $this->assertIsString($summoner->getRangeBurn());
        $this->assertImage($summoner->getImage());
        $this->assertIsString($summoner->getResource());
    }
}
