<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint;

use Zeggriim\RiotApiDataDragon\RiotApiDataDragon;

class ItemApi implements ItemApiInterface
{
    private const URL_ITEMS     = '/cdn/%s/data/%s/item.json';

    public function __construct(
        private readonly RiotApiDataDragon $riotApiDataDragon
    )
    {}

    public function getItems(string $version, string $locale = 'fr_FR'): array
    {
        return $this->riotApiDataDragon->get(sprintf(self::URL_ITEMS, $version, $locale));
    }
}
