<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataLeague;

use Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient;

class AccountApi implements AccountApiInterface
{
    private const URL_ACCOUNT_BY_PUUID = '/riot/account/v1/accounts/by-puuid/%s';
    private const URL_ACCOUNT_BY_RIOT_ID = '/riot/account/v1/accounts/by-riot-id/%s/%s';
    private const URL_ACCOUNT_ME = '/riot/account/v1/accounts/me';

    public function __construct(private readonly RiotApiDataLeagueClient $riotApiDataLeagueClient)
    {
    }

    public function getAccountByPuuid(string $puuid): array
    {
        $path = \sprintf(self::URL_ACCOUNT_BY_PUUID, $puuid);

        return $this->riotApiDataLeagueClient->get($path)->toArray();
    }

    public function getAccountByRiotId(string $gameName, string $tagLine): array
    {
        $path = \sprintf(self::URL_ACCOUNT_BY_RIOT_ID, $gameName, $tagLine);

        return $this->riotApiDataLeagueClient->get($path)->toArray();
    }

    public function getAccountByAccessToken(): array
    {
        return $this->riotApiDataLeagueClient->get(self::URL_ACCOUNT_ME)->toArray();
    }
}
