<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

interface ChampionApiInterface
{
    public function getChampions(string $version, string $locale = 'fr_FR'): array;
    public function getChampion(string $key, string $version, string $locale = 'fr_FR'): array;
}
