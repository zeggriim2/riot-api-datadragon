<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataLeague;

use Zeggriim\RiotApiDataDragon\Enum\Division;
use Zeggriim\RiotApiDataDragon\Enum\Queue;
use Zeggriim\RiotApiDataDragon\Enum\Tier;
use Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient;

class LeagueApi implements LeagueApiInterface
{
    private const URL_LEAGUE_CHALLENGER = '/lol/league/v4/challengerleagues/by-queue/%s';
    private const URL_LEAGUE_GRANDMASTER = '/lol/league/v4/grandmasterleagues/by-queue/%s';
    private const URL_LEAGUE_MASTER = '/lol/league/v4/masterleagues/by-queue/%s';
    private const URL_LEAGUE_OTHER = '/lol/league/v4/entries/%s/%s/%s';
    private const URL_LEAGUE_ID = '/lol/league/v4/leagues/%s';
    private const URL_LEAGUE_SUMMUNER_ID = '/lol/league/v4/entries/by-summoner/%s';

    public function __construct(private readonly RiotApiDataLeagueClient $riotApiDataLeague)
    {
    }

    public function getChallenger(Queue $queue = Queue::RANKED_SOLO): array
    {
        $path = \sprintf(self::URL_LEAGUE_CHALLENGER, $queue->value);

        return $this->riotApiDataLeague->get($path)->toArray();
    }

    public function getGrandMaster(Queue $queue = Queue::RANKED_SOLO): array
    {
        $path = \sprintf(self::URL_LEAGUE_GRANDMASTER, $queue->value);

        return $this->riotApiDataLeague->get($path)->toArray();
    }

    public function getMaster(Queue $queue = Queue::RANKED_SOLO): array
    {
        $path = \sprintf(self::URL_LEAGUE_MASTER, $queue->value);

        return $this->riotApiDataLeague->get($path)->toArray();
    }

    public function getAll(Queue $queue, Tier $tier, Division $division): array
    {
        $path = \sprintf(self::URL_LEAGUE_OTHER, $queue->value, $tier->value, $division->value);

        return $this->riotApiDataLeague->get($path)->toArray();
    }

    public function getLeagueWithId(string $leagueId): array
    {
        $path = \sprintf(self::URL_LEAGUE_ID, $leagueId);

        return $this->riotApiDataLeague->get($path)->toArray();
    }

    public function getLeagueInAllQueuesWithSummonerId(string $summonerId): array
    {
        $path = \sprintf(self::URL_LEAGUE_SUMMUNER_ID, $summonerId);

        return $this->riotApiDataLeague->get($path)->toArray();
    }
}
