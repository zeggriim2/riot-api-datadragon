<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Endpoint;

use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Summoner\SummonerCollection;

interface SummonerApiInterface
{
    public function getSummoner(string $version, string $locale = 'fr_FR'): array;

    public function getSummonerAsCollection(string $version, string $locale = 'fr_FR'): SummonerCollection;
}
