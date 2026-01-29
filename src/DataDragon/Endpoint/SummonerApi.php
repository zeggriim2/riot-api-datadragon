<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Endpoint;

use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Summoner\SummonerCollection;
use Zeggriim\RiotApiDataDragon\DataDragon\Transformer\SummonerTransformer;
use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;

class SummonerApi implements SummonerApiInterface
{
    private const URL_SUMMONER = '/cdn/%s/data/%s/summoner.json';

    public function __construct(
        private readonly RiotApiDataDragonClient $riotApiDataDragon,
        private readonly SummonerTransformer $summonerTransformer,
    ) {
    }

    public function getSummoner(string $version, string $locale = 'fr_FR'): array
    {
        return $this->riotApiDataDragon->get(\sprintf(self::URL_SUMMONER, $version, $locale))->toArray();
    }

    public function getSummonerAsCollection(string $version, string $locale = 'fr_FR'): SummonerCollection
    {
        $summonerData = $this->riotApiDataDragon->get(\sprintf(self::URL_SUMMONER, $version, $locale))->toArray();

        return $this->summonerTransformer->transformToCollection($summonerData);
    }
}
