<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint;

interface ItemApiInterface
{
    public function getItems(string $version, string $locale = 'fr_FR'): array;
}
