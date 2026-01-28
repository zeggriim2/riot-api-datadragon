<?php

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

interface SummonerApiInterface
{
    public function getSummoner(string $puuid): array;
}
