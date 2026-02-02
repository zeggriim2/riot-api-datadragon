<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Zeggriim\RiotApiDataDragon\DataLeague\Dto\ChampionMastery;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\ChampionMasteryCollection;
use Zeggriim\RiotApiDataDragon\Enum\Platform;

interface ChampionMasteryApiInterface
{
    /**
     * Get all champion mastery entries sorted by number of champion points descending.
     *
     * @return ChampionMasteryCollection Array of ChampionMastery data
     */
    public function getAllChampionMasteriesAsCollection(string $puuid, ?Platform $platform = null): ChampionMasteryCollection;

    public function getAllChampionMasteries(string $puuid, ?Platform $platform = null): array;

    /**
     * Get a champion mastery by puuid and champion ID.
     *
     * @return ChampionMastery ChampionMastery data for the specified champion
     */
    public function getChampionMasteryAsObject(string $puuid, int $championId, ?Platform $platform = null): ChampionMastery;

    public function getChampionMastery(string $puuid, int $championId, ?Platform $platform = null): array;

    /**
     * Get specified number of top champion masteries by puuid.
     *
     * @param int|null $count Number of entries to retrieve (default: 3, max: 10)
     *
     * @return ChampionMasteryCollection Array of top ChampionMastery entries
     */
    public function getTopChampionMasteriesAsCollection(string $puuid, ?Platform $platform = null, ?int $count = null): ChampionMasteryCollection;

    public function getTopChampionMasteries(string $puuid, ?Platform $platform = null, ?int $count = null): array;

    /**
     * Get a player's total champion mastery score.
     *
     * @return int Total mastery score
     */
    public function getTotalMasteryScore(string $puuid, ?Platform $platform = null): int;
}
