<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Dto\Champion;

final class ChampionSkin
{
    public function __construct(
        public readonly string $id,
        public readonly int $num,
        public readonly string $name,
        public readonly bool $chromas,
    ) {
    }
}
