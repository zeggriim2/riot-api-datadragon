<?php

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataLeague;

interface ChampionApiInterface
{
    public function getChampionRotation(): array;
}