<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Dto\Champion;

final class ChampionStats
{
    public function __construct(
        public readonly int|float $hp,
        public readonly int|float $hpperlevel,
        public readonly int|float $mp,
        public readonly int|float $mpperlevel,
        public readonly int|float $movespeed,
        public readonly int|float $armor,
        public readonly int|float $armorperlevel,
        public readonly int|float $spellblock,
        public readonly int|float $spellblockperlevel,
        public readonly int|float $attackrange,
        public readonly int|float $hpregen,
        public readonly int|float $hpregenperlevel,
        public readonly int|float $mpregen,
        public readonly int|float $mpregenperlevel,
        public readonly int|float $crit,
        public readonly int|float $critperlevel,
        public readonly int|float $attackdamage,
        public readonly int|float $attackdamageperlevel,
        public readonly int|float $attackspeed,
        public readonly int|float $attackspeedperlevel,
    ) {
    }
}
