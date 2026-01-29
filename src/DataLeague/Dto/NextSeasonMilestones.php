<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Dto;

final class NextSeasonMilestones
{
    public function __construct(
        public readonly array $requireGradeCounts,
        public readonly int $rewardMarks,
        public readonly bool $bonus,
        public readonly ?RewardConfig $rewardConfig = null,
    ) {
    }
}
