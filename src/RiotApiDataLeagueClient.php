<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Zeggriim\RiotApiDataDragon\DataLeague\RateLimit\RateLimitStatus;
use Zeggriim\RiotApiDataDragon\Enum\Platform;
use Zeggriim\RiotApiDataDragon\Enum\Region;
use Zeggriim\RiotApiDataDragon\Exception\DataNotFoundException;
use Zeggriim\RiotApiDataDragon\Exception\ForbiddenException;
use Zeggriim\RiotApiDataDragon\Exception\RequestException;
use Zeggriim\RiotApiDataDragon\Exception\ServerException;
use Zeggriim\RiotApiDataDragon\Exception\ServerLimitException;
use Zeggriim\RiotApiDataDragon\Exception\UnauthorizedException;
use Zeggriim\RiotApiDataDragon\Exception\UnsupportedMediaTypeException;

class RiotApiDataLeagueClient
{
    public const URL = 'https://%s.api.riotgames.com';

    private ?RateLimitStatus $lastRateLimitStatus = null;

    public function __construct(
        private readonly HttpClientInterface $riotLeague,
        private readonly string $apiKey,
        private readonly Platform|Region $defaultPlatform = Platform::EUW1,
    ) {
    }

    public function get(string $path, Platform|Region|null $platform = null): ResponseInterface
    {
        $platform = $platform ?? $this->defaultPlatform;
        $url = \sprintf(self::URL, $platform->value).$path;

        return $this->processRequest(Request::METHOD_GET, $url);
    }

    public function getDefaultPlatform(): Platform|Region
    {
        return $this->defaultPlatform;
    }

    public function getLastRateLimitStatus(): ?RateLimitStatus
    {
        return $this->lastRateLimitStatus;
    }

    private function processRequest(string $method, string $url): ResponseInterface
    {
        $response = null;

        try {
            $response = $this->riotLeague->request($method, $url, [
                'headers' => ['X-Riot-Token' => $this->apiKey],
            ]);
            $response->getContent();
            $this->lastRateLimitStatus = RateLimitStatus::fromHeaders($response->getHeaders(false));
        } catch (ClientExceptionInterface $exception) {
            $this->handleClientException($exception);
        } catch (ServerExceptionInterface $exception) {
            $this->handleServerException($exception);
        } catch (ExceptionInterface $exception) {
            throw new $exception();
        }

        return $response;
    }

    private function handleClientException(ClientExceptionInterface $exception): never
    {
        $response = $exception->getResponse();

        switch ($response->getStatusCode()) {
            case 400:
                throw new RequestException(code: $response->getStatusCode());
            case 401:
                throw new UnauthorizedException(code: $response->getStatusCode());
            case 403:
                throw new ForbiddenException(code: $response->getStatusCode());
            case 404:
                throw new DataNotFoundException(code: $response->getStatusCode());
            case 415:
                throw new UnsupportedMediaTypeException(code: $response->getStatusCode());
            case 429:
                $headers = $response->getHeaders(false);
                $retryAfter = isset($headers['retry-after'][0]) ? (int) $headers['retry-after'][0] : null;
                $limitType = $headers['x-rate-limit-type'][0] ?? null;

                throw new ServerLimitException(code: $response->getStatusCode(), retryAfter: $retryAfter, limitType: $limitType);
            default:
                throw $exception;
        }
    }

    private function handleServerException(ServerExceptionInterface $exception): never
    {
        $response = $exception->getResponse();

        switch ($response->getStatusCode()) {
            case 500:
                throw new ServerException('LeagueAPI: Internal server error occured.');
            case 503:
                throw new ServerException('LeagueAPI: Service is temporarily unavailable.');
            default:
                throw $exception;
        }
    }
}
