<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;

class ProfileIconApi implements ProfileIconApiInterface
{
    private const URL_PROFILE_ICON = '/cdn/%s/data/%s/profileicon.json';

    public function __construct(
        private readonly RiotApiDataDragonClient $riotApiDataDragon,
    ) {
    }

    public function getProfileIcon(string $version, string $locale = 'fr_FR'): array
    {
        return $this->riotApiDataDragon->get(\sprintf(self::URL_PROFILE_ICON, $version, $locale))->toArray();
    }
}
