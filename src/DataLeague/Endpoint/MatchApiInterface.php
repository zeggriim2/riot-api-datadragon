<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Zeggriim\RiotApiDataDragon\DataLeague\Filter\MatchFilter;
use Zeggriim\RiotApiDataDragon\Enum\Region;

interface MatchApiInterface
{
    /**
     * Get list of match IDs by PUUID.
     *
     * @return array<string> List of match IDs
     */
    public function getMatches(string $puuidSummoner, ?Region $region = null, ?MatchFilter $filter = null): array;

    /**
     * Get match details by match ID.
     *
     * @return array<string, mixed> Match data
     */
    public function getMatch(string $idMatch, ?Region $region = null): array;

    /**
     * Get match timeline by match ID.
     *
     * @return array<string, mixed> Timeline data
     */
    public function getMatchTimeline(string $idMatch, ?Region $region = null): array;
}
