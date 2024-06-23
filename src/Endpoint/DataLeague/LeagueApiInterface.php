<?php

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataLeague;

use Zeggriim\RiotApiDataDragon\Enum\Division;
use Zeggriim\RiotApiDataDragon\Enum\Queue;
use Zeggriim\RiotApiDataDragon\Enum\Tier;

interface LeagueApiInterface
{
    public function getChallenger(Queue $queue): array;

    public function getGrandMaster(Queue $queue): array;

    public function getMaster(Queue $queue): array;

    public function getAll(Queue $queue, Tier $tier, Division $division): array;

    public function getLeagueWithId(string $leagueId): array;

    public function getLeagueInAllQueuesWithSummonerId(string $summonerId): array;
}
