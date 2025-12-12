<?php

namespace Zeggriim\RiotApiDataDragon\DataDragon;

use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\ChampionApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\ItemApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\LanguageApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\ProfileIconApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\SummonerApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\VersionApiInterface;

interface DataDragonApiInterface
{
    public function versions(): VersionApiInterface;

    public function items(): ItemApiInterface;

    public function champions(): ChampionApiInterface;

    public function languages(): LanguageApiInterface;

    public function profileIcons(): ProfileIconApiInterface;

    public function summoners(): SummonerApiInterface;
}
