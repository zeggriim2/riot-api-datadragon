<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;

class ChampionApi implements ChampionApiInterface
{
    private const URL_CHAMPIONS = '/cdn/%s/data/%s/champion.json';
    private const URL_CHAMPION = '/cdn/%s/data/%s/champion/%s.json';

    public function __construct(private readonly RiotApiDataDragonClient $riotApiDataDragon)
    {
    }

    public function getChampions(string $version, string $locale = 'fr_FR'): array
    {
        return $this->riotApiDataDragon->get(\sprintf(self::URL_CHAMPIONS, $version, $locale))->toArray();
    }

    public function getChampion(string $key, string $version, string $locale = 'fr_FR'): array
    {
        return $this->riotApiDataDragon->get(\sprintf(self::URL_CHAMPION, $version, $locale, $key))->toArray();
    }
}
