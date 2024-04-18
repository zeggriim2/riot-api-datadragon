<?php

namespace Zeggriim\RiotApiDataDragon\Tests\Traits;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\MockHttpClient;
use Symfony\Component\HttpClient\Response\MockResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Zeggriim\RiotApiDataDragon\RiotApiDataDragon;

trait RiotApiDataDragonTrait
{
    private function getClientRiotApi(array $data): RiotApiDataDragon
    {
        $response = new MockResponse(json_encode($data));
        $this->createMock(HttpClientInterface::class);
        $httpClient = new MockHttpClient($response, 'https://api.riot.io/api/v1/');
        $logger = $this->createMock(LoggerInterface::class);
        return new RiotApiDataDragon($httpClient, $logger);
    }
}
