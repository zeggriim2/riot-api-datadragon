<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

final readonly class RiotApiDataDragonClient
{
    public function __construct(private HttpClientInterface $riotApi)
    {
    }

    public function get(string $path): ResponseInterface
    {
        return $this->processRequest(Request::METHOD_GET, $path);
    }

    private function processRequest(string $method, string $path): ResponseInterface
    {
        try {
            $response = $this->riotApi->request($method, $path);
            $response->getContent();
        } catch (ExceptionInterface $exception) {
            throw $exception;
        }

        return $response;
    }
}
