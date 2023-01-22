<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Zeggriim\RiotApiDatadragon\DataDragonApi;
use Zeggriim\RiotApiDatadragon\Enum\Languages;
use Zeggriim\RiotApiDatadragon\Enum\TypeReturn;
use Zeggriim\RiotApiDatadragon\Model\Champion\Champion;
use Zeggriim\RiotApiDatadragon\Model\Champion\ChampionDetail;
use Zeggriim\RiotApiDatadragon\Model\Summoner\Summoner;

class DataDragonApiTest extends TestCase
{
    private DataDragonApi $api;

    protected function setUp(): void
    {
        $this->api = new DataDragonApi("13.1.1", Languages::CODE_fr_FR);
    }

    public function testGetVersionApi()
    {
        $versions = $this->api->getVersions();
        $this->assertIsArray($versions);
        $this->assertNotEmpty($versions);
    }

    public function testGetLanguages()
    {
        $languages = $this->api->getLanguages();
        $this->assertIsArray($languages);
        $this->assertNotEmpty($languages);
    }

    public function testGetSummoner()
    {
        $summoners = $this->api->getSummoner();
        $this->assertGeneral($summoners, Summoner::class);
    }

    public function testGetChampionsArray()
    {
        $champions = $this->api->getChampions();
        $this->assertIsArray($champions);
    }

    public function testGetChampionsObjet()
    {
        $champions = $this->api->getChampions(TypeReturn::RETURN_OBJET);
        $this->assertGeneral($champions, Champion::class);
    }

    /**
     * @dataProvider nameChampionProvider
     */
    public function testGetChampionArray($name)
    {
        $champion = $this->api->getChampion($name);
        $this->assertIsArray($champion);
    }
    /**
     * @dataProvider nameChampionProvider
     */
    public function testGetChampionObjet($name)
    {
        $champion = $this->api->getChampion($name, TypeReturn::RETURN_OBJET);
        $this->assertIsArray($champion);
        $this->assertInstanceOf(ChampionDetail::class, $champion[ucfirst($name)]);
    }


    private function assertGeneral($actuals, $type)
    {
        $this->assertIsArray($actuals);
        foreach ($actuals as $actual) {
            $this->assertInstanceOf($type, $actual);
        }
    }


    public function nameChampionProvider()
    {
        return [
            "Aatrox with capitalization" => ["Aatrox"],
            "garen without capitalization" => ["garen"],
            "Lux with capitalization" => ["Lux"],
            "Qiyana without capitalization" => ["qiyana"],
            "TwistedFate with capitalization" => ["TwistedFate"],
        ];
    }
}
