<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Dto\Champion;

final class ChampionStats
{
    public function __construct(
        public readonly float $hp,
        public readonly float $hpperlevel,
        public readonly float $mp,
        public readonly float $mpperlevel,
        public readonly float $movespeed,
        public readonly float $armor,
        public readonly float $armorperlevel,
        public readonly float $spellblock,
        public readonly float $spellblockperlevel,
        public readonly float $attackrange,
        public readonly float $hpregen,
        public readonly float $hpregenperlevel,
        public readonly float $mpregen,
        public readonly float $mpregenperlevel,
        public readonly float $crit,
        public readonly float $critperlevel,
        public readonly float $attackdamage,
        public readonly float $attackdamageperlevel,
        public readonly float $attackspeed,
        public readonly float $attackspeedperlevel,
    ) {
    }
}
