<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Dto;

final class ChampionMastery
{
    public function __construct(
        public readonly string $puuid,
        public readonly int $championPointsUntilNextLevel,
        public readonly int $championId,
        public readonly ?\DateTimeImmutable $lastPlayTime,
        public readonly int $championLevel,
        public readonly int $championPoints,
        public readonly int $championPointsSinceLastLevel,
        public readonly int $markRequiredForNextLevel,
        public readonly int $championSeasonMilestone,
        public readonly ?NextSeasonMilestones $nextSeasonMilestone,
        public readonly int $tokensEarned,
        public readonly array $milestoneGrades = [],
        public readonly bool $chestGranted = false,
    ) {
    }
}
