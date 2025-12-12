<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Endpoint;

use Zeggriim\RiotApiDataDragon\DataDragon\Dto\ProfileIcon\ProfileIconCollection;

interface ProfileIconApiInterface
{
    public function getProfileIcon(string $version, string $locale = 'fr_FR'): array;

    public function getProfileIconAsCollection(string $version, string $locale = 'fr_FR'): ProfileIconCollection;
}
