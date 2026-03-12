<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Zeggriim\RiotApiDataDragon\Enum\Platform;
use Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient;

class ChampionApi implements ChampionApiInterface
{
    private const URL_CHAMPION_ROTATION = '/lol/platform/v3/champion-rotations';

    public function __construct(private readonly RiotApiDataLeagueClient $riotApiDataLeague)
    {
    }

    public function getChampionRotation(?Platform $platform = null): array
    {
        return $this->riotApiDataLeague->get(self::URL_CHAMPION_ROTATION, $platform ?? $this->riotApiDataLeague->getDefaultPlatform())->toArray();
    }
}
