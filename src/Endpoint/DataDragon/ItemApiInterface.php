<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

use Zeggriim\RiotApiDataDragon\Dto\Item\ItemCollection;

interface ItemApiInterface
{
    public function getItems(string $version, string $locale = 'fr_FR'): array;

    public function getItemsAsCollection(string $version, string $locale = 'fr_FR'): ItemCollection;
}
