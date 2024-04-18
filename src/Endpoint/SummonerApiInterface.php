<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint;

interface SummonerApiInterface
{
    public function getSummoner(string $version, string $locale = 'fr_FR'): array;
}
