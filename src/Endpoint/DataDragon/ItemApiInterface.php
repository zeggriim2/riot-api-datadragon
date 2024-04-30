<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

interface ItemApiInterface
{
    public function getItems(string $version, string $locale = 'fr_FR'): array;
}
