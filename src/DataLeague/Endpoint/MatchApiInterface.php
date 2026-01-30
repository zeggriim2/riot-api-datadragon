<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Zeggriim\RiotApiDataDragon\DataLeague\Filter\MatchFilter;

interface MatchApiInterface
{
    /**
     * Get list of match IDs by PUUID.
     *
     * @return array<string> List of match IDs
     */
    public function getMatches(string $puuidSummoner, ?MatchFilter $filter = null): array;

    /**
     * Get match details by match ID.
     *
     * @return array<string, mixed> Match data
     */
    public function getMatch(string $idMatch): array;

    /**
     * Get match timeline by match ID.
     *
     * @return array<string, mixed> Timeline data
     */
    public function getMatchTimeline(string $idMatch): array;
}
