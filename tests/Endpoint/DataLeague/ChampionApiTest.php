<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Endpoint\DataLeague;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataLeagueTrait;

class ChampionApiTest extends KernelTestCase
{
    use RiotApiDataLeagueTrait;
    public function testGetChampionRotation()
    {
        $dataResponse = [
            "freeChampionIds"=> [13, 14, 18, 25, 35, 45, 53, 57, 72, 85, 114, 133, 166, 200, 221, 222, 238, 245, 555, 897],
            "freeChampionIdsForNewPlayers"=> [222, 254, 33, 82, 131, 350, 54, 17, 18, 37, 51, 145, 134, 89, 875, 80, 115, 91, 113, 112],
            "maxNewPlayerLevel"=> 10
        ];

        $championApi = $this->getChampionApi($dataResponse);
        $championRotation = $championApi->getChampionRotation();

        self::assertIsArray($championRotation);
        self::assertArrayHasKey('freeChampionIds', $championRotation);
        self::assertCount(count($dataResponse['freeChampionIds']), $championRotation['freeChampionIds']);
        self::assertArrayHasKey('freeChampionIdsForNewPlayers', $championRotation);
        self::assertCount(count($dataResponse['freeChampionIdsForNewPlayers']), $championRotation['freeChampionIdsForNewPlayers']);
        self::assertArrayHasKey('maxNewPlayerLevel', $championRotation);
        self::assertSame($dataResponse['maxNewPlayerLevel'], $championRotation['maxNewPlayerLevel']);
    }
}