<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Dto\Summoner;

use Zeggriim\RiotApiDataDragon\Dto\Image;

final class Summoner
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $description,
        public readonly string $tooltip,
        public readonly int $maxrank,
        public readonly array $cooldown,
        public readonly string $cooldownBurn,
        public readonly array $cost,
        public readonly string $costBurn,
        public readonly array $effect,
        public readonly array $effectBurn,
        public readonly array $vars,
        public readonly string $key,
        public readonly int $summonerLevel,
        public readonly array $modes,
        public readonly string $costType,
        public readonly string $maxammo,
        public readonly array $range,
        public readonly string $rangeBurn,
        public readonly string $resource,
        public readonly ?Image $image = null,
    ) {
    }
}
