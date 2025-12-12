<?php

namespace Zeggriim\RiotApiDataDragon\DataLeague\endpoint;

interface SummonerApiInterface
{
    public function getSummoner(string $puuid): array;
}
