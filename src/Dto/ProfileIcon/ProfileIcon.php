<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Dto\ProfileIcon;

final readonly class ProfileIcon
{
    public function __construct(
        public int $id,
        public ?ProfileIconImage $profileIconImage = null,
    ) {
    }
}
