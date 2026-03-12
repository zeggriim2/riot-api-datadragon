<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Zeggriim\RiotApiDataDragon\Enum\Platform;
use Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient;

class AccountApi implements AccountApiInterface
{
    private const URL_ACCOUNT_BY_PUUID = '/riot/account/v1/accounts/by-puuid/%s';
    private const URL_ACCOUNT_BY_RIOT_ID = '/riot/account/v1/accounts/by-riot-id/%s/%s';
    private const URL_ACCOUNT_ME = '/riot/account/v1/accounts/me';

    public function __construct(private readonly RiotApiDataLeagueClient $riotApiDataLeagueClient)
    {
    }

    public function getAccountByPuuid(string $puuid, ?Platform $platform = null): array
    {
        $path = \sprintf(self::URL_ACCOUNT_BY_PUUID, $puuid);

        return $this->riotApiDataLeagueClient->get($path, ($platform ?? $this->riotApiDataLeagueClient->getDefaultPlatform())->toRegion())->toArray();
    }

    public function getAccountByRiotId(string $gameName, string $tagLine, ?Platform $platform = null): array
    {
        $path = \sprintf(self::URL_ACCOUNT_BY_RIOT_ID, $gameName, $tagLine);

        return $this->riotApiDataLeagueClient->get($path, ($platform ?? $this->riotApiDataLeagueClient->getDefaultPlatform())->toRegion())->toArray();
    }

    public function getAccountByAccessToken(?Platform $platform = null): array
    {
        return $this->riotApiDataLeagueClient->get(self::URL_ACCOUNT_ME, ($platform ?? $this->riotApiDataLeagueClient->getDefaultPlatform())->toRegion())->toArray();
    }
}
