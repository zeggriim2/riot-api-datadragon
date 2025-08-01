<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataLeague;

use Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient;

class MatchApi implements MatchApiInterface
{
    public const URL_MATCHS = 'lol/match/v5/matches/by-puuid/%s/ids';
    private const URL_MATCH = '/lol/match/v5/matches/%s';
    private const URL_MATCH_TIMELINE = '/lol/match/v5/matches/%s/timeline';

    public function __construct(private readonly RiotApiDataLeagueClient $riotApiDataLeague)
    {
    }

    public function getMatchs(string $puuidSummoner): array
    {
        $url = \sprintf(self::URL_MATCHS, $puuidSummoner);

        return $this->riotApiDataLeague->get($url)->toArray();
    }

    public function getMatch(string $idMatch): array
    {
        $url = \sprintf(self::URL_MATCH, $idMatch);

        return $this->riotApiDataLeague->get($url)->toArray();
    }

    public function getMatchTimeLine(string $idMatch): array
    {
        $url = \sprintf(self::URL_MATCH_TIMELINE, $idMatch);

        return $this->riotApiDataLeague->get($url)->toArray();
    }
}
