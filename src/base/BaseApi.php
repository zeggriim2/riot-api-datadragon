<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\base;

use Symfony\Component\HttpClient\Exception\JsonException;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

abstract class BaseApi
{
    private HttpClientInterface $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    /**
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws ClientExceptionInterface
     *
     * @return array|string
     */
    protected function makeCall(string $url, string $method = 'GET', array $options = [])
    {
        $response = $this->client->request($method, $url, $options);

        if (200 === $response->getStatusCode()) {
            try {
                return $response->toArray();
            } catch (JsonException $exception) {
                return $response->getContent();
            }
        }
        //  TODO Exception
    }
}
