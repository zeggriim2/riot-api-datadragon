<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

use Zeggriim\RiotApiDataDragon\RiotApiDataDragon;

class SummonerApi implements SummonerApiInterface
{
    private const URL_SUMMONER  = '/cdn/%s/data/%s/summoner.json';

    public function __construct(
        private readonly RiotApiDataDragon $riotApiDataDragon
    ) {}

    public function getSummoner(string $version, string $locale = 'fr_FR'): array
    {
        return $this->riotApiDataDragon->get(sprintf(self::URL_SUMMONER, $version, $locale));
    }
}
