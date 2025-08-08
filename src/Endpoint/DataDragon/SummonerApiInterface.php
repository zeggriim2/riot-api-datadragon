<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

use Zeggriim\RiotApiDataDragon\Dto\Summoner\SummonerCollection;

interface SummonerApiInterface
{
    public function getSummoner(string $version, string $locale = 'fr_FR'): array;

    public function getSummonerAsCollection(string $version, string $locale = 'fr_FR'): SummonerCollection;
}
