<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Dto\Summoner;

final class SummonerImage
{
    public function __construct(
        public string $full,
        public string $sprite,
        public string $group,
        public int $x,
        public int $y,
        public int $w,
        public int $h,
    ) {
    }
}