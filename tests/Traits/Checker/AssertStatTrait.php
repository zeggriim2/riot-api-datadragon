<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Traits\Checker;

use Zeggriim\RiotApiDataDragon\Dto\Champion\ChampionStats;

trait AssertStatTrait
{
    public function assertStat(array $dataStats, array $stats): void
    {
        self::assertArrayHasKey('hp', $stats);
        self::assertEquals($dataStats['hp'], $stats['hp']);
        self::assertArrayHasKey('hpperlevel', $stats);
        self::assertEquals($dataStats['hpperlevel'], $stats['hpperlevel']);
        self::assertArrayHasKey('mp', $stats);
        self::assertEquals($dataStats['mp'], $stats['mp']);
        self::assertArrayHasKey('mpperlevel', $stats);
        self::assertEquals($dataStats['mpperlevel'], $stats['mpperlevel']);
        self::assertArrayHasKey('movespeed', $stats);
        self::assertEquals($dataStats['movespeed'], $stats['movespeed']);
        self::assertArrayHasKey('armor', $stats);
        self::assertEquals($dataStats['armor'], $stats['armor']);
        self::assertArrayHasKey('armorperlevel', $stats);
        self::assertEquals($dataStats['armorperlevel'], $stats['armorperlevel']);
        self::assertArrayHasKey('spellblock', $stats);
        self::assertEquals($dataStats['spellblock'], $stats['spellblock']);
        self::assertArrayHasKey('spellblockperlevel', $stats);
        self::assertEquals($dataStats['spellblockperlevel'], $stats['spellblockperlevel']);
        self::assertArrayHasKey('attackrange', $stats);
        self::assertEquals($dataStats['attackrange'], $stats['attackrange']);
        self::assertArrayHasKey('hpregen', $stats);
        self::assertEquals($dataStats['hpregen'], $stats['hpregen']);
        self::assertArrayHasKey('hpregenperlevel', $stats);
        self::assertEquals($dataStats['hpregenperlevel'], $stats['hpregenperlevel']);
        self::assertArrayHasKey('mpregen', $stats);
        self::assertEquals($dataStats['mpregen'], $stats['mpregen']);
        self::assertArrayHasKey('mpregenperlevel', $stats);
        self::assertEquals($dataStats['mpregenperlevel'], $stats['mpregenperlevel']);
        self::assertArrayHasKey('crit', $stats);
        self::assertEquals($dataStats['crit'], $stats['crit']);
        self::assertArrayHasKey('critperlevel', $stats);
        self::assertEquals($dataStats['critperlevel'], $stats['critperlevel']);
        self::assertArrayHasKey('attackdamage', $stats);
        self::assertEquals($dataStats['attackdamage'], $stats['attackdamage']);
        self::assertArrayHasKey('attackdamageperlevel', $stats);
        self::assertEquals($dataStats['attackdamageperlevel'], $stats['attackdamageperlevel']);
        self::assertArrayHasKey('attackspeedperlevel', $stats);
        self::assertEquals($dataStats['attackspeedperlevel'], $stats['attackspeedperlevel']);
        self::assertArrayHasKey('attackspeed', $stats);
        self::assertEquals($dataStats['attackspeed'], $stats['attackspeed']);
    }

    public function assertStatObjet(array $dataStats, ChampionStats $stats): void
    {
        self::assertEquals($dataStats['hp'], $stats->hp);
        self::assertEquals($dataStats['hpperlevel'], $stats->hpperlevel);
        self::assertEquals($dataStats['mp'], $stats->mp);
        self::assertEquals($dataStats['mpperlevel'], $stats->mpperlevel);
        self::assertEquals($dataStats['movespeed'], $stats->movespeed);
        self::assertEquals($dataStats['armor'], $stats->armor);
        self::assertEquals($dataStats['armorperlevel'], $stats->armorperlevel);
        self::assertEquals($dataStats['spellblock'], $stats->spellblock);
        self::assertEquals($dataStats['spellblockperlevel'], $stats->spellblockperlevel);
        self::assertEquals($dataStats['attackrange'], $stats->attackrange);
        self::assertEquals($dataStats['hpregen'], $stats->hpregen);
        self::assertEquals($dataStats['hpregenperlevel'], $stats->hpregenperlevel);
        self::assertEquals($dataStats['mpregen'], $stats->mpregen);
        self::assertEquals($dataStats['mpregenperlevel'], $stats->mpregenperlevel);
        self::assertEquals($dataStats['crit'], $stats->crit);
        self::assertEquals($dataStats['critperlevel'], $stats->critperlevel);
        self::assertEquals($dataStats['attackdamage'], $stats->attackdamage);
        self::assertEquals($dataStats['attackdamageperlevel'], $stats->attackdamageperlevel);
        self::assertEquals($dataStats['attackspeedperlevel'], $stats->attackspeedperlevel);
        self::assertEquals($dataStats['attackspeed'], $stats->attackspeed);
    }
}
