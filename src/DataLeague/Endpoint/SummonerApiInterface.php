<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Zeggriim\RiotApiDataDragon\DataLeague\Dto\Summoner;
use Zeggriim\RiotApiDataDragon\Enum\Platform;

interface SummonerApiInterface
{
    public function getSummoner(string $puuid, ?Platform $platform = null): array;

    public function getSummonerAsObject(string $puuid, ?Platform $platform = null): Summoner;
}
