<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Tests;

use Zeggriim\RiotApiDatadragon\Enum\TypeReturn;
use Zeggriim\RiotApiDatadragon\Model\GameMode;
use Zeggriim\RiotApiDatadragon\Model\GameType;
use Zeggriim\RiotApiDatadragon\Model\Map;
use Zeggriim\RiotApiDatadragon\Model\Queue;
use Zeggriim\RiotApiDatadragon\Model\Season;
use Zeggriim\RiotApiDatadragon\Tests\Traits\AssertGeneralTrait;

class DataDragonApiTest extends BaseApiTest
{
    use AssertGeneralTrait;

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
        $this->assertMap($maps[0]);
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
        $this->assertSeason($seasons[0]);
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
        $this->assertQueue($queues[0]);
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
        $this->assertGameMode($gameModes[0]);
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
        $this->assertGameType($gameTypes[0]);
    }

    private function assertMap(Map $map)
    {
        $this->assertIsInt($map->getMapId());
        $this->assertIsString($map->getMapName());
        $this->assertIsString($map->getNotes());
    }

    private function assertSeason(Season $season)
    {
        $this->assertIsInt($season->getId());
        $this->assertIsString($season->getSeason());
    }

    private function assertQueue(Queue $queue)
    {
        $this->assertIsInt($queue->getQueueId());
        $this->assertIsString($queue->getMap());
        $this->assertNullOrIsString($queue->getDescription());
        $this->assertNullOrIsString($queue->getNotes());
    }

    private function assertGameMode(GameMode $gameMode)
    {
        $this->assertIsString($gameMode->getGameMode());
        $this->assertIsString($gameMode->getDescription());
    }

    private function assertGameType(GameType $gameType)
    {
        $this->assertIsString($gameType->getGametype());
        $this->assertIsString($gameType->getDescription());
    }
}
