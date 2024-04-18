<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Traits\Checker;

trait CheckerStatTrait
{
    public function checkStat(array $dataStats, array $stats): void
    {
        self::assertArrayHasKey('hp', $stats);
        self::assertSame($dataStats['hp'], $stats['hp']);
        self::assertArrayHasKey('hpperlevel', $stats);
        self::assertSame($dataStats['hpperlevel'], $stats['hpperlevel']);
        self::assertArrayHasKey('mp', $stats);
        self::assertSame($dataStats['mp'], $stats['mp']);
        self::assertArrayHasKey('mpperlevel', $stats);
        self::assertSame($dataStats['mpperlevel'], $stats['mpperlevel']);
        self::assertArrayHasKey('movespeed', $stats);
        self::assertSame($dataStats['movespeed'], $stats['movespeed']);
        self::assertArrayHasKey('armor', $stats);
        self::assertSame($dataStats['armor'], $stats['armor']);
        self::assertArrayHasKey('armorperlevel', $stats);
        self::assertSame($dataStats['armorperlevel'], $stats['armorperlevel']);
        self::assertArrayHasKey('spellblock', $stats);
        self::assertSame($dataStats['spellblock'], $stats['spellblock']);
        self::assertArrayHasKey('spellblockperlevel', $stats);
        self::assertSame($dataStats['spellblockperlevel'], $stats['spellblockperlevel']);
        self::assertArrayHasKey('attackrange', $stats);
        self::assertSame($dataStats['attackrange'], $stats['attackrange']);
        self::assertArrayHasKey('hpregen', $stats);
        self::assertSame($dataStats['hpregen'], $stats['hpregen']);
        self::assertArrayHasKey('hpregenperlevel', $stats);
        self::assertSame($dataStats['hpregenperlevel'], $stats['hpregenperlevel']);
        self::assertArrayHasKey('mpregen', $stats);
        self::assertSame($dataStats['mpregen'], $stats['mpregen']);
        self::assertArrayHasKey('mpregenperlevel', $stats);
        self::assertSame($dataStats['mpregenperlevel'], $stats['mpregenperlevel']);
        self::assertArrayHasKey('crit', $stats);
        self::assertSame($dataStats['crit'], $stats['crit']);
        self::assertArrayHasKey('critperlevel', $stats);
        self::assertSame($dataStats['critperlevel'], $stats['critperlevel']);
        self::assertArrayHasKey('attackdamage', $stats);
        self::assertSame($dataStats['attackdamage'], $stats['attackdamage']);
        self::assertArrayHasKey('attackdamageperlevel', $stats);
        self::assertSame($dataStats['attackdamageperlevel'], $stats['attackdamageperlevel']);
        self::assertArrayHasKey('attackspeedperlevel', $stats);
        self::assertSame($dataStats['attackspeedperlevel'], $stats['attackspeedperlevel']);
        self::assertArrayHasKey('attackspeed', $stats);
        self::assertSame($dataStats['attackspeed'], $stats['attackspeed']);
    }
}
