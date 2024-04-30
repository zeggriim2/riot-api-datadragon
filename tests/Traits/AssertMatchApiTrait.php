<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Traits;

trait AssertMatchApiTrait
{
    public function assertMatch(array $dataSend,array $match): void
    {
        self::assertArrayHasKey('metadata', $dataSend);
        $this->assertMetaData($dataSend['metadata'], $match['metadata']);
        self::assertArrayHasKey('info', $dataSend);
        $this->assertInfo($dataSend['info'], $match['info']);
    }

    public function assertMetaData(array $dataSend, array $match): void
    {
        self::assertArrayHasKey('dataVersion', $dataSend);
        self::assertSame($dataSend['dataVersion'], $match['dataVersion']);
        self::assertArrayHasKey('matchId', $dataSend);
        self::assertSame($dataSend['matchId'], $match['matchId']);
        self::assertCount(count($match['participants']), $dataSend['participants']);
        for ($i = 0; $i < count($dataSend['participants']); $i++) {
            self::assertSame($dataSend['participants'][$i], $match['participants'][$i]);
        }
    }

    public function assertInfo(array $dataSend, array $match): void
    {
        self::assertArrayHasKey('endOfGameResult', $dataSend);
        self::assertSame($dataSend['endOfGameResult'], $match['endOfGameResult']);
    }
}