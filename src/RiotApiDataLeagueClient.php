<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon;

use Symfony\Component\HttpClient\HttpOptions;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;
use Zeggriim\RiotApiDataDragon\Enum\Platform;
use Zeggriim\RiotApiDataDragon\Exception\DataNotFoundException;
use Zeggriim\RiotApiDataDragon\Exception\ForbiddenException;
use Zeggriim\RiotApiDataDragon\Exception\RequestException;
use Zeggriim\RiotApiDataDragon\Exception\ServerException;
use Zeggriim\RiotApiDataDragon\Exception\UnauthorizedException;
use Zeggriim\RiotApiDataDragon\Exception\UnsupportedMediaTypeException;

class RiotApiDataLeagueClient
{
    public const URL = 'https://%s.api.riotgames.com';

    public function __construct(
        public HttpClientInterface $riotLeague,
        private readonly string $apiKey,
        private readonly Platform $platform = Platform::EUW1,
    ) {
        $this->riotLeague = $this->riotLeague->withOptions(
            (new HttpOptions())
                ->setBaseUri(\sprintf(self::URL, $this->platform->value))
                ->setHeaders(['X-Riot-Token' => $this->apiKey])
                ->toArray()
        );
    }

    public function get(string $path): ResponseInterface
    {
        return $this->processRequest(Request::METHOD_GET, $path);
    }

    private function processRequest(string $method, string $path): ResponseInterface
    {
        try {
            $response = $this->riotLeague->request($method, $path);
            $response->getContent();
        } catch (ClientExceptionInterface $exception) {
            switch ($response->getStatusCode()) {
                case 400:
                    throw new RequestException();
                case 401:
                    throw new UnauthorizedException();
                case 403:
                    throw new ForbiddenException();
                case 404:
                    throw new DataNotFoundException();
                case 415:
                    throw new UnsupportedMediaTypeException();
                default:
                    throw new $exception($response);
            }
        } catch (ServerExceptionInterface $exception) {
            switch ($response->getStatusCode()) {
                case 500:
                    throw new ServerException('LeagueAPI: Internal server error occured.');
                case 503:
                    throw new ServerException('LeagueAPI: Service is temporarily unavailable.');
                default:
                    throw new $exception($response);
            }
        } catch (ExceptionInterface $exception) {
            throw new $exception();
        }

        return $response;
    }
}
