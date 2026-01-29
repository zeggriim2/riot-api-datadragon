<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Dto;

final class RewardConfig
{
    public function __construct(
        public readonly string $rewardValue,
        public readonly string $rewardType,
        public readonly int $maximumReward,
    ) {
    }
}
