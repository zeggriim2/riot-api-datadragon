<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataLeague;

interface AccountApiInterface
{
    /**
     * Get account by PUUID.
     *
     * @return array Account data with gameName, tagLine, and puuid
     */
    public function getAccountByPuuid(string $puuid): array;

    /**
     * Get account by Riot ID (gameName + tagLine).
     *
     * @return array Account data with gameName, tagLine, and puuid
     */
    public function getAccountByRiotId(string $gameName, string $tagLine): array;

    /**
     * Get active account by access token (requires OAuth).
     *
     * @return array Account data with gameName, tagLine, and puuid
     */
    public function getAccountByAccessToken(): array;
}
