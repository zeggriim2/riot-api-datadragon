<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Tests;

class DataDragonApiTest extends BaseApiTest
{
    public function testGetVersionApi()
    {
        $versions = $this->dataDragonApiVerionAndLanguages->getVersions();
        $this->assertIsArray($versions);
        $this->assertNotEmpty($versions);
    }

    public function testGetLanguages()
    {
        $languages = $this->dataDragonApiVerionAndLanguages->getLanguages();
        $this->assertIsArray($languages);
        $this->assertNotEmpty($languages);
    }

    public function testGetMaps()
    {
        $maps = $this->dataDragonApiVerionAndLanguages->getMaps();
        $this->assertIsArray($maps);
        $this->assertNotEmpty($maps);
    }

    public function testGetSeasons()
    {
        $seasons = $this->dataDragonApiVerionAndLanguages->getSeasons();
        $this->assertIsArray($seasons);
        $this->assertNotEmpty($seasons);
    }

    public function testGetQueues()
    {
        $queues = $this->dataDragonApiVerionAndLanguages->getQueues();
        $this->assertIsArray($queues);
        $this->assertNotEmpty($queues);
    }

    public function testGetGameModes()
    {
        $gameModes = $this->dataDragonApiVerionAndLanguages->getGameModes();
        $this->assertIsArray($gameModes);
        $this->assertNotEmpty($gameModes);
    }

    public function testGetGameTypes()
    {
        $gameType = $this->dataDragonApiVerionAndLanguages->getGameTypes();
        $this->assertIsArray($gameType);
        $this->assertNotEmpty($gameType);
    }
}
