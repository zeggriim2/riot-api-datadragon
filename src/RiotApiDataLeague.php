<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpClient\HttpOptions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Zeggriim\RiotApiDataDragon\Enum\Platform;

class RiotApiDataLeague
{
    public const URL = 'https://%s.api.riotgames.com';

    public function __construct(
        public HttpClientInterface      $riotLeague,
        public readonly LoggerInterface $logger,
        private readonly string         $apiKey,
        private readonly Platform       $platform = Platform::EUW1,
    ) {
        $this->riotLeague = $this->riotLeague->withOptions(
            (new HttpOptions())
                ->setBaseUri(sprintf(self::URL, $this->platform->value))
                ->setHeaders(['X-Riot-Token' => $this->apiKey])
                ->toArray()
        );
    }

    public function get(string $path): array
    {
        try {
            return $this->processRequest(Request::METHOD_GET, $path);
        } catch (ExceptionInterface $exception) {
            return [];
        }
    }

    private function processRequest(string $method, string $path): array
    {
        try {
            $response = $this->riotLeague->request($method, $path);
            $response = $response->toArray();
        } catch (HttpExceptionInterface $exception) {
            $this->logger->critical(
                'An error occured when process Riot Api request.',
                [
                    'method' => $method,
                    'request' => $path,
                    'exception_class' => \get_class($exception),
                    'exception_message' => $exception->getMessage(),
                ]
            );

            throw $exception;
        }

        return $response;
    }
}
