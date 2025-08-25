<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Dto\Item;

final class Gold
{
    public function __construct(
        public readonly int $base,
        public readonly bool $purchasable,
        public readonly int $sell,
        public readonly int $total,
    ) {
    }
}
