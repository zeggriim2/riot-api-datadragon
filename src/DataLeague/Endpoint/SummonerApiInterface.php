<?php

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Zeggriim\RiotApiDataDragon\DataLeague\Dto\Summoner;

interface SummonerApiInterface
{
    public function getSummoner(string $puuid): array;

    public function getSummonerAsObject(string $puuid): Summoner;
}
