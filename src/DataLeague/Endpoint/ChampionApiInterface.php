<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Zeggriim\RiotApiDataDragon\Enum\Platform;

interface ChampionApiInterface
{
    public function getChampionRotation(?Platform $platform = null): array;
}
