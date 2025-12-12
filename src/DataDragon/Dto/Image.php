<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Dto;

final class Image
{
    public function __construct(
        public readonly string $full,
        public readonly string $sprite,
        public readonly string $group,
        public readonly int $x,
        public readonly int $y,
        public readonly int $w,
        public readonly int $h,
    ) {
    }
}
