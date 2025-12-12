<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon;

use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\ChampionApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\ItemApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\LanguageApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\ProfileIconApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\SummonerApiInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\VersionApiInterface;

final class DataDragonApi implements DataDragonApiInterface
{
    public function __construct(
        private readonly VersionApiInterface $versionApi,
        private readonly ItemApiInterface $itemApi,
        private readonly ChampionApiInterface $championApi,
        private readonly LanguageApiInterface $languageApi,
        private readonly ProfileIconApiInterface $profileIconApi,
        private readonly SummonerApiInterface $summonerApi,
    ) {
    }

    public function versions(): VersionApiInterface
    {
        return $this->versionApi;
    }

    public function items(): ItemApiInterface
    {
        return $this->itemApi;
    }

    public function champions(): ChampionApiInterface
    {
        return $this->championApi;
    }

    public function languages(): LanguageApiInterface
    {
        return $this->languageApi;
    }

    public function profileIcons(): ProfileIconApiInterface
    {
        return $this->profileIconApi;
    }

    public function summoners(): SummonerApiInterface
    {
        return $this->summonerApi;
    }
}
