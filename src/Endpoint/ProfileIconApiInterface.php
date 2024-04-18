<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint;

interface ProfileIconApiInterface
{
    public function getProfileIcon(string $version, string $locale = 'fr_FR'): array;
}
