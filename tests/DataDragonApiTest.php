<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Tests;

use Zeggriim\RiotApiDatadragon\Enum\TypeReturn;
use Zeggriim\RiotApiDatadragon\Model\GameMode;
use Zeggriim\RiotApiDatadragon\Model\GameType;
use Zeggriim\RiotApiDatadragon\Model\Map;
use Zeggriim\RiotApiDatadragon\Model\Queue;
use Zeggriim\RiotApiDatadragon\Model\Season;

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

    public function testGetMapsArray()
    {
        $maps = $this->dataDragonApiVerionAndLanguages->getMaps();
        $this->assertIsArray($maps);
        $this->assertNotEmpty($maps);
    }

    public function testGetMapsObject()
    {
        $maps = $this->dataDragonApiVerionAndLanguages->getMaps(TypeReturn::RETURN_OBJET);
        foreach ($maps as $map) {
            $this->assertInstanceOf(Map::class, $map);
        }
    }

    public function testGetSeasonsArray()
    {
        $seasons = $this->dataDragonApiVerionAndLanguages->getSeasons();
        $this->assertIsArray($seasons);
        $this->assertNotEmpty($seasons);
    }

    public function testGetSeasonsObject()
    {
        $seasons = $this->dataDragonApiVerionAndLanguages->getSeasons(TypeReturn::RETURN_OBJET);
        foreach ($seasons as $season) {
            $this->assertInstanceOf(Season::class, $season);
        }
    }

    public function testGetQueuesArray()
    {
        $queues = $this->dataDragonApiVerionAndLanguages->getQueues();
        $this->assertIsArray($queues);
        $this->assertNotEmpty($queues);
    }

    public function testGetQueuesObject()
    {
        $queues = $this->dataDragonApiVerionAndLanguages->getQueues(TypeReturn::RETURN_OBJET);
        foreach ($queues as $queue) {
            $this->assertInstanceOf(Queue::class, $queue);
        }
    }

    public function testGetGameModesArray()
    {
        $gameModes = $this->dataDragonApiVerionAndLanguages->getGameModes();
        $this->assertIsArray($gameModes);
        $this->assertNotEmpty($gameModes);
    }

    public function testGetGameModesObject()
    {
        $gameModes = $this->dataDragonApiVerionAndLanguages->getGameModes(TypeReturn::RETURN_OBJET);
        foreach ($gameModes as $gameMode) {
            $this->assertInstanceOf(GameMode::class, $gameMode);
        }
    }

    public function testGetGameTypesArray()
    {
        $gameType = $this->dataDragonApiVerionAndLanguages->getGameTypes();
        $this->assertIsArray($gameType);
        $this->assertNotEmpty($gameType);
    }

    public function testGetGameTypesObject()
    {
        $gameTypes = $this->dataDragonApiVerionAndLanguages->getGameTypes(TypeReturn::RETURN_OBJET);
        foreach ($gameTypes as $gameType) {
            $this->assertInstanceOf(GameType::class, $gameType);
        }
    }
}
