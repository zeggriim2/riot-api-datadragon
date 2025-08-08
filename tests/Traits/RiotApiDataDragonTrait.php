<?php

namespace Zeggriim\RiotApiDataDragon\Tests\Traits;

use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ChampionApi;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ItemApi;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\LanguageApi;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ProfileIconApi;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\SummonerApi;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\VersionApi;
use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;
use Zeggriim\RiotApiDataDragon\Serializer\Normalizer\Champion\ChampionCollectionNormalizer;
use Zeggriim\RiotApiDataDragon\Serializer\Normalizer\Champion\ChampionNormalizer;
use Zeggriim\RiotApiDataDragon\Serializer\Normalizer\LanguageCollectionNormalizer;
use Zeggriim\RiotApiDataDragon\Serializer\Normalizer\ProfileIcon\ProfileIconCollectionNormalizer;
use Zeggriim\RiotApiDataDragon\Serializer\Normalizer\ProfileIcon\ProfileIconNormalizer;
use Zeggriim\RiotApiDataDragon\Serializer\Normalizer\Summoner\SummonerCollectionNormalizer;
use Zeggriim\RiotApiDataDragon\Serializer\Normalizer\Summoner\SummonerNormalizer;
use Zeggriim\RiotApiDataDragon\Transformer\ChampionTransformer;
use Zeggriim\RiotApiDataDragon\Transformer\LanguageTransformer;
use Zeggriim\RiotApiDataDragon\Transformer\ProfileIconTransformer;
use Zeggriim\RiotApiDataDragon\Transformer\SummonerTransformer;

trait RiotApiDataDragonTrait
{
    private function getChampionApi(array $dataResponse, array $info = ['http_code' => 200]): ChampionApi
    {
        $championCollectionNormalizer = new ChampionCollectionNormalizer();
        $championNormalizer = new ChampionNormalizer();

        $normalizers = [
            $championCollectionNormalizer,
            $championNormalizer,
            new ArrayDenormalizer(),
            new ObjectNormalizer(),
        ];

        $serializer = new Serializer($normalizers, [new JsonEncoder()]);

        $championCollectionNormalizer->setDenormalizer($serializer);
        $championNormalizer->setDenormalizer($serializer);

        $transformer = new ChampionTransformer($serializer);

        return new ChampionApi(
            $this->getClientRiotApiDataDragon($dataResponse, $info),
            $transformer
        );
    }

    private function getItemApi(array $dataResponse, array $info = ['http_code' => 200]): ItemApi
    {
        return new ItemApi($this->getClientRiotApiDataDragon($dataResponse, $info));
    }

    private function getLanguageApi(array $dataResponse, array $info = ['http_code' => 200]): LanguageApi
    {
        $languageCollectionNormalizer = new LanguageCollectionNormalizer();
        $normalizers = [
            $languageCollectionNormalizer,
            new ArrayDenormalizer(),
            new ObjectNormalizer(),
        ];

        $serializer = new Serializer($normalizers, [new JsonEncoder()]);
        $languageCollectionNormalizer->setDenormalizer($serializer);

        $transformer = new LanguageTransformer($serializer);

        return new LanguageApi(
            $this->getClientRiotApiDataDragon($dataResponse, $info),
            $transformer
        );
    }

    private function getSummonerApi(array $dataResponse, array $info = ['http_code' => 200]): SummonerApi
    {
        $summonerCollectionNormalizer = new SummonerCollectionNormalizer();
        $summonerNormalizer = new SummonerNormalizer();

        $normalizers = [
            $summonerCollectionNormalizer,
            $summonerNormalizer,
            new ArrayDenormalizer(),
            new ObjectNormalizer(),
        ];

        $serializer = new Serializer($normalizers, [new JsonEncoder()]);

        $summonerCollectionNormalizer->setDenormalizer($serializer);
        $summonerNormalizer->setDenormalizer($serializer);

        $transformer = new SummonerTransformer($serializer);

        return new SummonerApi(
            $this->getClientRiotApiDataDragon($dataResponse, $info),
            $transformer
        );
    }

    private function getVersionApi(array $dataResponse, array $info = ['http_code' => 200]): VersionApi
    {
        return new VersionApi($this->getClientRiotApiDataDragon($dataResponse, $info));
    }

    private function getProfileIconApi(array $dataResponse, array $info = ['http_code' => 200]): ProfileIconApi
    {
        $profileIconCollectionNormalizer = new ProfileIconCollectionNormalizer();
        $profileIconNormalizer = new ProfileIconNormalizer();

        $normalizers = [
            $profileIconCollectionNormalizer,
            $profileIconNormalizer,
            new ArrayDenormalizer(),
            new ObjectNormalizer(),
        ];

        $serializer = new Serializer($normalizers, [new JsonEncoder()]);
        $profileIconCollectionNormalizer->setDenormalizer($serializer);
        $profileIconNormalizer->setDenormalizer($serializer);

        $transformer = new ProfileIconTransformer($serializer);

        return new ProfileIconApi(
            $this->getClientRiotApiDataDragon($dataResponse, $info),
            $transformer
        );
    }

    private function getClientRiotApiDataDragon(array $data, array $info = ['http_code' => 200]): RiotApiDataDragonClient
    {
        $jsonData = json_encode($data);
        if (false === $jsonData) {
            throw new \RuntimeException('Failed to encode data as JSON');
        }

        $response = new MockResponse($jsonData, $info);
        $this->createMock(HttpClientInterface::class);
        $httpClient = new MockHttpClient($response, 'https://api.riot.io/api/v1/');

        return new RiotApiDataDragonClient($httpClient);
    }
}
