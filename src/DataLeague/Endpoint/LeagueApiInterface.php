<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Zeggriim\RiotApiDataDragon\Enum\Division;
use Zeggriim\RiotApiDataDragon\Enum\Platform;
use Zeggriim\RiotApiDataDragon\Enum\Queue;
use Zeggriim\RiotApiDataDragon\Enum\Tier;

interface LeagueApiInterface
{
    public function getChallenger(?Platform $platform = null, Queue $queue = Queue::RANKED_SOLO): array;

    public function getGrandMaster(?Platform $platform = null, Queue $queue = Queue::RANKED_SOLO): array;

    public function getMaster(?Platform $platform = null, Queue $queue = Queue::RANKED_SOLO): array;

    public function getAll(Queue $queue, Tier $tier, Division $division, ?Platform $platform = null): array;

    public function getLeagueWithId(string $leagueId, ?Platform $platform = null): array;

    public function getLeagueInAllQueuesWithSummonerId(string $summonerId, ?Platform $platform = null): array;
}
