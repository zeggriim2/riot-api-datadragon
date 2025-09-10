<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataLeague;

use Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient;

class SummonerApi implements SummonerApiInterface
{
    private const URL_SUMMONER = '/lol/summoner/v4/summoners/by-puuid/%s';

    public function __construct(private readonly RiotApiDataLeagueClient $riotApiDataLeague)
    {
    }

    public function getSummoner(string $puuid): array
    {
        $url = \sprintf(self::URL_SUMMONER, $puuid);

        return $this->riotApiDataLeague->get($url)->toArray();
    }
}
