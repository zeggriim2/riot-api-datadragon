<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Zeggriim\RiotApiDataDragon\DataLeague\Dto\ChampionMastery;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\ChampionMasteryCollection;

interface ChampionMasteryApiInterface
{
    /**
     * Get all champion mastery entries sorted by number of champion points descending.
     *
     * @return ChampionMasteryCollection Array of ChampionMastery data
     */
    public function getAllChampionMasteriesAsCollection(string $puuid): ChampionMasteryCollection;

    public function getAllChampionMasteries(string $puuid): array;

    /**
     * Get a champion mastery by puuid and champion ID.
     *
     * @return ChampionMastery ChampionMastery data for the specified champion
     */
    public function getChampionMasteryAsObject(string $puuid, int $championId): ChampionMastery;

    public function getChampionMastery(string $puuid, int $championId): array;

    /**
     * Get specified number of top champion masteries by puuid.
     *
     * @param int|null $count Number of entries to retrieve (default: 3, max: 10)
     *
     * @return ChampionMasteryCollection Array of top ChampionMastery entries
     */
    public function getTopChampionMasteriesAsCollection(string $puuid, ?int $count = null): ChampionMasteryCollection;

    public function getTopChampionMasteries(string $puuid, ?int $count = null): array;

    /**
     * Get a player's total champion mastery score.
     *
     * @return int Total mastery score
     */
    public function getTotalMasteryScore(string $puuid): int;
}
