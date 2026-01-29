<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Dto;

final class Summoner
{
    public function __construct(
        public readonly string $puuid,
        public readonly int $revisionDate,
        public readonly int $profileIconId,
        public readonly int $summonerLevel,
    ) {
    }
}
