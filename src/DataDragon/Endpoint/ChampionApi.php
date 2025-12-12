<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Endpoint;

use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Champion\Champion;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Champion\ChampionCollection;
use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;
use Zeggriim\RiotApiDataDragon\Transformer\ChampionTransformer;

class ChampionApi implements ChampionApiInterface
{
    private const URL_CHAMPIONS = '/cdn/%s/data/%s/champion.json';
    private const URL_CHAMPION = '/cdn/%s/data/%s/champion/%s.json';

    public function __construct(
        private readonly RiotApiDataDragonClient $riotApiDataDragon,
        private readonly ChampionTransformer $championTransformer,
    ) {
    }

    public function getChampions(string $version, string $locale = 'fr_FR'): array
    {
        return $this->riotApiDataDragon->get(\sprintf(self::URL_CHAMPIONS, $version, $locale))->toArray();
    }

    public function getChampionsAsCollection(string $version, string $locale = 'fr_FR'): ChampionCollection
    {
        $championsData = $this->riotApiDataDragon->get(\sprintf(self::URL_CHAMPIONS, $version, $locale))->toArray();

        return $this->championTransformer->transformToCollection($championsData);
    }

    public function getChampion(string $key, string $version, string $locale = 'fr_FR'): array
    {
        return $this->riotApiDataDragon->get(\sprintf(self::URL_CHAMPION, $version, $locale, $key))->toArray();
    }

    public function getChampionAsObject(string $key, string $version, string $locale = 'fr_FR'): Champion
    {
        $championData = $this->riotApiDataDragon->get(\sprintf(self::URL_CHAMPION, $version, $locale, $key))->toArray();

        return $this->championTransformer->transformToChampion($championData);
    }
}
