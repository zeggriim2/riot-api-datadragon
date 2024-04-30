<?php

namespace Zeggriim\RiotApiDataDragon\Tests\Traits;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Zeggriim\RiotApiDataDragon\Endpoint\DataLeague\LeagueApi;
use Zeggriim\RiotApiDataDragon\Endpoint\DataLeague\MatchApi;
use Zeggriim\RiotApiDataDragon\RiotApiDataLeague;

trait RiotApiDataLeagueTrait
{
    private function getLeagueApi(array $dataResponse, array $info = ['http_code' => 200]): LeagueApi
    {
        return new LeagueApi($this->getClientRiotApiDataLeague($dataResponse, $info));
    }

    private function getMatchApi(array $dataResponse, array $info = ['http_code' => 200]): MatchApi
    {
        return new MatchApi($this->getClientRiotApiDataLeague($dataResponse, $info));
    }

    private function getClientRiotApiDataLeague(array $data,array $info = ['http_code' => 200]): RiotApiDataLeague
    {
        $response = new MockResponse(json_encode($data), $info);
        $this->createMock(HttpClientInterface::class);
        $httpClient = new MockHttpClient($response, null);
        $logger = $this->createMock(LoggerInterface::class);
        return new RiotApiDataLeague($httpClient, $logger);
    }
}