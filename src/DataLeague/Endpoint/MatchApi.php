<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Zeggriim\RiotApiDataDragon\DataLeague\Filter\MatchFilter;
use Zeggriim\RiotApiDataDragon\Enum\Platform;
use Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient;

class MatchApi implements MatchApiInterface
{
    private const URL_MATCHES = '/lol/match/v5/matches/by-puuid/%s/ids';
    private const URL_MATCH = '/lol/match/v5/matches/%s';
    private const URL_MATCH_TIMELINE = '/lol/match/v5/matches/%s/timeline';

    public function __construct(private readonly RiotApiDataLeagueClient $riotApiDataLeague)
    {
    }

    public function getMatches(string $puuidSummoner, ?Platform $platform = null, ?MatchFilter $filter = null): array
    {
        $url = \sprintf(self::URL_MATCHES, $puuidSummoner);

        if (null !== $filter) {
            $url .= $filter->toQueryString();
        }

        return $this->riotApiDataLeague->get($url, ($platform ?? $this->riotApiDataLeague->getDefaultPlatform())->toRegion())->toArray();
    }

    public function getMatch(string $idMatch, ?Platform $platform = null): array
    {
        $url = \sprintf(self::URL_MATCH, $idMatch);

        return $this->riotApiDataLeague->get($url, ($platform ?? $this->riotApiDataLeague->getDefaultPlatform())->toRegion())->toArray();
    }

    public function getMatchTimeline(string $idMatch, ?Platform $platform = null): array
    {
        $url = \sprintf(self::URL_MATCH_TIMELINE, $idMatch);

        return $this->riotApiDataLeague->get($url, ($platform ?? $this->riotApiDataLeague->getDefaultPlatform())->toRegion())->toArray();
    }
}
