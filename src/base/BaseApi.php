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
use Zeggriim\RiotApiDatadragon\Serializer\Denormalizer;

abstract class BaseApi
{
    private HttpClientInterface $client;

    public function __construct()
    {
        $this->client = HttpClient::create();
    }

    /**
     * @param string $url
     * @param string $method
     * @return array|string
     * @throws DecodingExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws ClientExceptionInterface
     */
    protected function makeCall(string $url, string $method = "GET", array $options = [])
    {
        $response = $this->client->request($method, $url, $options);

        if ($response->getStatusCode() === 200) {
            try {
                return $response->toArray();
            } catch (JsonException $exception) {
                return $response->getContent();
            }
        }
        //  TODO Exception
    }
}
