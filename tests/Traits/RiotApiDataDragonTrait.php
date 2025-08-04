<?php

namespace Zeggriim\RiotApiDataDragon\Tests\Traits;

use Psr\Log\LoggerInterface;
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
use Zeggriim\RiotApiDataDragon\Serializer\Normalizer\ChampionCollectionNormalizer;
use Zeggriim\RiotApiDataDragon\Serializer\Normalizer\ChampionNormalizer;
use Zeggriim\RiotApiDataDragon\Transformer\ChampionTransformer;

trait RiotApiDataDragonTrait
{
    private function getChampionApi(array $dataResponse, array $info = ['http_code' => 200]): ChampionApi
    {
        $championCollectionNormalizer = new ChampionCollectionNormalizer();
        $championNormalizer = new ChampionNormalizer();

        $normalizers = [
            $championCollectionNormalizer, // Doit être en premier
            $championNormalizer, // Doit être en premier
            new ArrayDenormalizer(),
            new ObjectNormalizer(),
        ];

        $serializer = new Serializer($normalizers, [new JsonEncoder()]);

        // IMPORTANT : Le normalizer doit connaître le serializer
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
        return new LanguageApi($this->getClientRiotApiDataDragon($dataResponse, $info));
    }

    private function getSummonerApi(array $dataResponse, array $info = ['http_code' => 200]): SummonerApi
    {
        return new SummonerApi($this->getClientRiotApiDataDragon($dataResponse, $info));
    }

    private function getVersionApi(array $dataResponse, array $info = ['http_code' => 200]): VersionApi
    {
        return new VersionApi($this->getClientRiotApiDataDragon($dataResponse, $info));
    }

    private function getProfileIconApi(array $dataResponse, array $info = ['http_code' => 200]): ProfileIconApi
    {
        return new ProfileIconApi($this->getClientRiotApiDataDragon($dataResponse, $info));
    }

    private function getClientRiotApiDataDragon(array $data,array $info = ['http_code' => 200]): RiotApiDataDragonClient
    {
        $jsonData = json_encode($data);
        if ($jsonData === false) {
            throw new \RuntimeException('Failed to encode data as JSON');
        }

        $response = new MockResponse($jsonData, $info);
        $this->createMock(HttpClientInterface::class);
        $httpClient = new MockHttpClient($response, 'https://api.riot.io/api/v1/');
        return new RiotApiDataDragonClient($httpClient);
    }
}
