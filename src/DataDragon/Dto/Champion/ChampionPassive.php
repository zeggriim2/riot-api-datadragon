<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Dto\Champion;

use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Image;

final class ChampionPassive
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly Image $image,
    ) {
    }
}
