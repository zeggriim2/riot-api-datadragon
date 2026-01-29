<?php

namespace Zeggriim\RiotApiDataDragon\Tests\Traits;

use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Zeggriim\RiotApiDataDragon\DataLeague\Endpoint\AccountApi;
use Zeggriim\RiotApiDataDragon\DataLeague\Endpoint\ChampionApi;
use Zeggriim\RiotApiDataDragon\DataLeague\Endpoint\ChampionMasteryApi;
use Zeggriim\RiotApiDataDragon\DataLeague\Endpoint\LeagueApi;
use Zeggriim\RiotApiDataDragon\DataLeague\Endpoint\MatchApi;
use Zeggriim\RiotApiDataDragon\DataLeague\Serializer\Normalizer\ChampionMastery\ChampionMasteryCollectionNormalizer;
use Zeggriim\RiotApiDataDragon\DataLeague\Serializer\Normalizer\ChampionMastery\ChampionMasteryNormalizer;
use Zeggriim\RiotApiDataDragon\DataLeague\Serializer\Normalizer\ChampionMastery\NextSeasonMilestonesNormalizer;
use Zeggriim\RiotApiDataDragon\DataLeague\Serializer\Normalizer\ChampionMastery\RewardConfigNormalizer;
use Zeggriim\RiotApiDataDragon\DataLeague\Transformer\ChampionMasteryTransformer;
use Zeggriim\RiotApiDataDragon\Enum\Platform;
use Zeggriim\RiotApiDataDragon\Enum\Region;
use Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient;

trait RiotApiDataLeagueTrait
{
    private function getLeagueApi(array $dataResponse, array $info = ['http_code' => 200]): LeagueApi
    {
        return new LeagueApi($this->getClientRiotApiDataLeague($dataResponse, Platform::EUW1, $info));
    }

    private function getMatchApi(array $dataResponse, array $info = ['http_code' => 200]): MatchApi
    {
        return new MatchApi($this->getClientRiotApiDataLeague($dataResponse, Platform::EUW1, $info));
    }

    public function getChampionApi(array $dataResponse, array $info = ['http_code' => 200]): ChampionApi
    {
        return new ChampionApi($this->getClientRiotApiDataLeague($dataResponse, Platform::EUW1, $info));
    }

    private function getAccountApi(array $dataResponse, array $info = ['http_code' => 200]): AccountApi
    {
        return new AccountApi($this->getClientRiotApiDataLeague($dataResponse, Region::EUROPE, $info));
    }

    private function getChampionMasteryApi(array $dataResponse, array $info = ['http_code' => 200]): ChampionMasteryApi
    {
        $championMasteryCollectionNormalizer = new ChampionMasteryCollectionNormalizer();
        $championMasteryNormalizer = new ChampionMasteryNormalizer();
        $nextSeasonMilesNormalizer = new NextSeasonMilestonesNormalizer();
        $rewardConfigNormalizer = new RewardConfigNormalizer();
        $normalizers = [
            $championMasteryCollectionNormalizer,
            $championMasteryNormalizer,
            $nextSeasonMilesNormalizer,
            $rewardConfigNormalizer,
            new ArrayDenormalizer(),
            new ObjectNormalizer(),
        ];

        $serializer = new Serializer($normalizers, [new JsonEncoder()]);
        $championMasteryCollectionNormalizer->setDenormalizer($serializer);
        $championMasteryNormalizer->setDenormalizer($serializer);
        $nextSeasonMilesNormalizer->setDenormalizer($serializer);
        $rewardConfigNormalizer->setDenormalizer($serializer);

        $transformer = new ChampionMasteryTransformer($serializer);

        return new ChampionMasteryApi(
            $this->getClientRiotApiDataLeague($dataResponse, Region::EUROPE, $info),
            $transformer
        );
    }

    private function getClientRiotApiDataLeague(array $data, Platform|Region $platform, array $info = ['http_code' => 200]): RiotApiDataLeagueClient
    {
        $jsonData = json_encode($data);
        if (false === $jsonData) {
            throw new \RuntimeException('Failed to encode data as JSON');
        }

        $response = new MockResponse($jsonData, $info);
        $this->createMock(HttpClientInterface::class);
        $httpClient = new MockHttpClient($response, null);

        return new RiotApiDataLeagueClient($httpClient, 'key', $platform);
    }
}
