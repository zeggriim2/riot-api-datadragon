<?php

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataLeague;

interface SummonerApiInterface
{
    public function getSummoner(string $puuid): array;
}
