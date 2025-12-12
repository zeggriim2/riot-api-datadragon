<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Endpoint;

use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Champion\Champion;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Champion\ChampionCollection;

interface ChampionApiInterface
{
    public function getChampions(string $version, string $locale = 'fr_FR'): array;

    public function getChampionsAsCollection(string $version, string $locale = 'fr_FR'): ChampionCollection;

    public function getChampion(string $key, string $version, string $locale = 'fr_FR'): array;

    public function getChampionAsObject(string $key, string $version, string $locale = 'fr_FR'): Champion;
}
