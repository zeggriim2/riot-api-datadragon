<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon;

use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ChampionApiInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ItemApiInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\LanguageApiInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ProfileIconApiInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\SummonerApiInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\VersionApiInterface;

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
