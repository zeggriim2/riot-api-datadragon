<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataLeague;

use Zeggriim\RiotApiDataDragon\RiotApiDataLeague;

class MatchApi implements MatchApiInterface
{
    public const URL_MATCHS = 'lol/match/v5/matches/by-puuid/%s/ids';
    private const URL_MATCH = '/lol/match/v5/matches/%s';
    private const URL_MATCH_TIMELINE = '/lol/match/v5/matches/%s/timeline';

    public function __construct(
        private readonly RiotApiDataLeague $riotApiDataLeague
    ) {}

    public function getMatchs(string $puuidSummoner): array
    {
        $url = sprintf(self::URL_MATCHS, $puuidSummoner);
        return $this->riotApiDataLeague->get($url);
    }

    public function getMatch(string $idMatch): array
    {
        $url = sprintf(self::URL_MATCH, $idMatch);
        return $this->riotApiDataLeague->get($url);
    }

    public function getMatchTimeLine(string $idMatch): array
    {
        $url = sprintf(self::URL_MATCH_TIMELINE, $idMatch);
        return $this->riotApiDataLeague->get($url);
    }
}