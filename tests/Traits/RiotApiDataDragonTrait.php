<?php

namespace Zeggriim\RiotApiDataDragon\Tests\Traits;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ChampionApi;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ItemApi;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\LanguageApi;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ProfileIconApi;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\SummonerApi;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\VersionApi;
use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;

trait RiotApiDataDragonTrait
{
    private function getChampionApi(array $dataResponse, array $info = ['http_code' => 200]): ChampionApi
    {
        return new ChampionApi($this->getClientRiotApiDataDragon($dataResponse, $info));
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
        $response = new MockResponse(json_encode($data), $info);
        $this->createMock(HttpClientInterface::class);
        $httpClient = new MockHttpClient($response, 'https://api.riot.io/api/v1/');
        $logger = $this->createMock(LoggerInterface::class);
        return new RiotApiDataDragonClient($httpClient, $logger);
    }
}
