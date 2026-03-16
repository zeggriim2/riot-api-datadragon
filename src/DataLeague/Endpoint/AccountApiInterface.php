<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Zeggriim\RiotApiDataDragon\Enum\Region;

interface AccountApiInterface
{
    /**
     * Get account by PUUID.
     *
     * @return array Account data with gameName, tagLine, and puuid
     */
    public function getAccountByPuuid(string $puuid, ?Region $region = null): array;

    /**
     * Get account by Riot ID (gameName + tagLine).
     *
     * @return array Account data with gameName, tagLine, and puuid
     */
    public function getAccountByRiotId(string $gameName, string $tagLine, ?Region $region = null): array;

    /**
     * Get active account by access token (requires OAuth).
     *
     * @return array Account data with gameName, tagLine, and puuid
     */
    public function getAccountByAccessToken(?Region $region = null): array;
}
