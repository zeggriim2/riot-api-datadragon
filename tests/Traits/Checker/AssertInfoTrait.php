<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Traits\Checker;

use Zeggriim\RiotApiDataDragon\Dto\Champion\ChampionInfo;

trait AssertInfoTrait
{
    private function assertInfo(array $dataInfo, array $info): void
    {
        self::assertArrayHasKey('attack', $info);
        self::assertSame($dataInfo['attack'], $info['attack']);
        self::assertArrayHasKey('defense', $info);
        self::assertSame($dataInfo['defense'], $info['defense']);
        self::assertArrayHasKey('magic', $info);
        self::assertSame($dataInfo['magic'], $info['magic']);
        self::assertArrayHasKey('difficulty', $info);
        self::assertSame($dataInfo['difficulty'], $info['difficulty']);
    }

    public function assertInfoObjet(array $dataInfo, ChampionInfo $info): void
    {
        self::assertSame($dataInfo['attack'], $info->attack);
        self::assertSame($dataInfo['defense'], $info->defense);
        self::assertSame($dataInfo['magic'], $info->magic);
        self::assertSame($dataInfo['difficulty'], $info->difficulty);
    }
}
