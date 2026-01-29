<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\ChampionMastery;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\ChampionMasteryCollection;
use Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient;

class ChampionMasteryApi implements ChampionMasteryApiInterface
{
    private const URL_ALL_MASTERIES = '/lol/champion-mastery/v4/champion-masteries/by-puuid/%s';
    private const URL_MASTERY_BY_CHAMPION = '/lol/champion-mastery/v4/champion-masteries/by-puuid/%s/by-champion/%d';
    private const URL_TOP_MASTERIES = '/lol/champion-mastery/v4/champion-masteries/by-puuid/%s/top';
    private const URL_TOTAL_SCORE = '/lol/champion-mastery/v4/scores/by-puuid/%s';

    public function __construct(
        private readonly RiotApiDataLeagueClient $riotApiDataLeagueClient,
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function getAllChampionMasteriesAsCollection(string $puuid): ChampionMasteryCollection
    {
        $url = \sprintf(self::URL_ALL_MASTERIES, $puuid);

        $championMasteriesData = $this->riotApiDataLeagueClient->get($url)->toArray();

        return $this->denormalizer->denormalize($championMasteriesData, ChampionMasteryCollection::class);
    }

    public function getAllChampionMasteries(string $puuid): array
    {
        $url = \sprintf(self::URL_ALL_MASTERIES, $puuid);

        return $this->riotApiDataLeagueClient->get($url)->toArray();
    }

    public function getChampionMasteryAsObject(string $puuid, int $championId): ChampionMastery
    {
        $url = \sprintf(self::URL_MASTERY_BY_CHAMPION, $puuid, $championId);

        $championMasteyData = $this->riotApiDataLeagueClient->get($url)->toArray();

        return $this->denormalizer->denormalize($championMasteyData, ChampionMastery::class);
    }

    public function getChampionMastery(string $puuid, int $championId): array
    {
        $url = \sprintf(self::URL_MASTERY_BY_CHAMPION, $puuid, $championId);

        return $this->riotApiDataLeagueClient->get($url)->toArray();
    }

    public function getTopChampionMasteriesAsCollection(string $puuid, ?int $count = null): ChampionMasteryCollection
    {
        $url = \sprintf(self::URL_TOP_MASTERIES, $puuid);

        if (null !== $count) {
            $url .= '?count='.$count;
        }

        $championMasteriesData = $this->riotApiDataLeagueClient->get($url)->toArray();

        return $this->denormalizer->denormalize($championMasteriesData, ChampionMasteryCollection::class);
    }

    public function getTopChampionMasteries(string $puuid, ?int $count = null): array
    {
        $url = \sprintf(self::URL_TOP_MASTERIES, $puuid);

        if (null !== $count) {
            $url .= '?count='.$count;
        }

        return $this->riotApiDataLeagueClient->get($url)->toArray();
    }

    public function getTotalMasteryScore(string $puuid): int
    {
        $url = \sprintf(self::URL_TOTAL_SCORE, $puuid);
        $responseArray = $this->riotApiDataLeagueClient->get($url)->toArray();

        return $responseArray[array_key_first($responseArray)];
    }
}
