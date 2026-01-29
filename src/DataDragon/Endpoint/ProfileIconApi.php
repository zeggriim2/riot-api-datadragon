<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Endpoint;

use Zeggriim\RiotApiDataDragon\DataDragon\Dto\ProfileIcon\ProfileIconCollection;
use Zeggriim\RiotApiDataDragon\DataDragon\Transformer\ProfileIconTransformer;
use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;

class ProfileIconApi implements ProfileIconApiInterface
{
    private const URL_PROFILE_ICON = '/cdn/%s/data/%s/profileicon.json';

    public function __construct(
        private readonly RiotApiDataDragonClient $riotApiDataDragon,
        private readonly ProfileIconTransformer $profileIconTransformer,
    ) {
    }

    public function getProfileIcon(string $version, string $locale = 'fr_FR'): array
    {
        return $this->riotApiDataDragon->get(\sprintf(self::URL_PROFILE_ICON, $version, $locale))->toArray();
    }

    public function getProfileIconAsCollection(string $version, string $locale = 'fr_FR'): ProfileIconCollection
    {
        $profileIconData = $this->riotApiDataDragon->get(\sprintf(self::URL_PROFILE_ICON, $version, $locale))->toArray();

        return $this->profileIconTransformer->transformToCollection($profileIconData);
    }
}
