<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model\Summoner;

class Summoners
{
    private SummonerData $SummonerBarrier;
    private SummonerData $SummonerBoost;
    private SummonerData $SummonerDot;
    private SummonerData $SummonerExhaust;
    private SummonerData $SummonerFlash;
    private SummonerData $SummonerHaste;
    private SummonerData $SummonerHeal;
    private SummonerData $SummonerMana;
    private SummonerData $SummonerPoroRecall;
    private SummonerData $SummonerPoroThrow;
    private SummonerData $SummonerSmite;
    private SummonerData $SummonerSnowURFSnowball_Mark;
    private SummonerData $SummonerSnowball;
    private SummonerData $SummonerTeleport;
    private SummonerData $Summoner_UltBookPlaceholder;
    private SummonerData $Summoner_UltBookSmitePlaceholder;

    public function getSummonerBarrier(): SummonerData
    {
        return $this->SummonerBarrier;
    }

    public function setSummonerBarrier(SummonerData $SummonerBarrier): void
    {
        $this->SummonerBarrier = $SummonerBarrier;
    }

    public function getSummonerBoost(): SummonerData
    {
        return $this->SummonerBoost;
    }

    public function setSummonerBoost(SummonerData $SummonerBoost): void
    {
        $this->SummonerBoost = $SummonerBoost;
    }

    public function getSummonerDot(): SummonerData
    {
        return $this->SummonerDot;
    }

    public function setSummonerDot(SummonerData $SummonerDot): void
    {
        $this->SummonerDot = $SummonerDot;
    }

    public function getSummonerExhaust(): SummonerData
    {
        return $this->SummonerExhaust;
    }

    public function setSummonerExhaust(SummonerData $SummonerExhaust): void
    {
        $this->SummonerExhaust = $SummonerExhaust;
    }

    public function getSummonerFlash(): SummonerData
    {
        return $this->SummonerFlash;
    }

    public function setSummonerFlash(SummonerData $SummonerFlash): void
    {
        $this->SummonerFlash = $SummonerFlash;
    }

    public function getSummonerHaste(): SummonerData
    {
        return $this->SummonerHaste;
    }

    public function setSummonerHaste(SummonerData $SummonerHaste): void
    {
        $this->SummonerHaste = $SummonerHaste;
    }

    public function getSummonerHeal(): SummonerData
    {
        return $this->SummonerHeal;
    }

    public function setSummonerHeal(SummonerData $SummonerHeal): void
    {
        $this->SummonerHeal = $SummonerHeal;
    }

    public function getSummonerMana(): SummonerData
    {
        return $this->SummonerMana;
    }

    public function setSummonerMana(SummonerData $SummonerMana): void
    {
        $this->SummonerMana = $SummonerMana;
    }

    public function getSummonerPoroRecall(): SummonerData
    {
        return $this->SummonerPoroRecall;
    }

    public function setSummonerPoroRecall(SummonerData $SummonerPoroRecall): void
    {
        $this->SummonerPoroRecall = $SummonerPoroRecall;
    }

    public function getSummonerPoroThrow(): SummonerData
    {
        return $this->SummonerPoroThrow;
    }

    public function setSummonerPoroThrow(SummonerData $SummonerPoroThrow): void
    {
        $this->SummonerPoroThrow = $SummonerPoroThrow;
    }

    public function getSummonerSmite(): SummonerData
    {
        return $this->SummonerSmite;
    }

    public function setSummonerSmite(SummonerData $SummonerSmite): void
    {
        $this->SummonerSmite = $SummonerSmite;
    }

    public function getSummonerSnowURFSnowballMark(): SummonerData
    {
        return $this->SummonerSnowURFSnowball_Mark;
    }

    public function setSummonerSnowURFSnowballMark(SummonerData $SummonerSnowURFSnowball_Mark): void
    {
        $this->SummonerSnowURFSnowball_Mark = $SummonerSnowURFSnowball_Mark;
    }

    public function getSummonerSnowball(): SummonerData
    {
        return $this->SummonerSnowball;
    }

    public function setSummonerSnowball(SummonerData $SummonerSnowball): void
    {
        $this->SummonerSnowball = $SummonerSnowball;
    }

    public function getSummonerTeleport(): SummonerData
    {
        return $this->SummonerTeleport;
    }

    public function setSummonerTeleport(SummonerData $SummonerTeleport): void
    {
        $this->SummonerTeleport = $SummonerTeleport;
    }

    public function getSummonerUltBookPlaceholder(): SummonerData
    {
        return $this->Summoner_UltBookPlaceholder;
    }

    public function setSummonerUltBookPlaceholder(SummonerData $Summoner_UltBookPlaceholder): void
    {
        $this->Summoner_UltBookPlaceholder = $Summoner_UltBookPlaceholder;
    }

    public function getSummonerUltBookSmitePlaceholder(): SummonerData
    {
        return $this->Summoner_UltBookSmitePlaceholder;
    }

    public function setSummonerUltBookSmitePlaceholder(SummonerData $Summoner_UltBookSmitePlaceholder): void
    {
        $this->Summoner_UltBookSmitePlaceholder = $Summoner_UltBookSmitePlaceholder;
    }
}