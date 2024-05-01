<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataLeague;

use Zeggriim\RiotApiDataDragon\RiotApiDataLeague;

class ChampionApi implements ChampionApiInterface
{
    private const URL_CHAMPION_ROTATION = '/lol/platform/v3/champion-rotations';

    public function __construct(private readonly RiotApiDataLeague $riotApiDataLeague) {}


    public function getChampionRotation(): array
    {
        return $this->riotApiDataLeague->get(self::URL_CHAMPION_ROTATION);
    }
}