<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Dto\Champion;

final class ChampionInfo
{
    public function __construct(
        public readonly int $attack,
        public readonly int $defense,
        public readonly int $magic,
        public readonly int $difficulty,
    ) {
    }
}
