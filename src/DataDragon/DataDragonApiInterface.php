<?php

namespace Zeggriim\RiotApiDataDragon\DataDragon;

use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ChampionApiInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ItemApiInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\LanguageApiInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ProfileIconApiInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\SummonerApiInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\VersionApiInterface;

interface DataDragonApiInterface
{
    public function versions(): VersionApiInterface;

    public function items(): ItemApiInterface;

    public function champions(): ChampionApiInterface;

    public function languages(): LanguageApiInterface;

    public function profileIcons(): ProfileIconApiInterface;

    public function summoners(): SummonerApiInterface;
}
