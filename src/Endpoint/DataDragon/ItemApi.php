<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

use Zeggriim\RiotApiDataDragon\Dto\Item\ItemCollection;
use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;
use Zeggriim\RiotApiDataDragon\Transformer\ItemTransformer;

class ItemApi implements ItemApiInterface
{
    private const URL_ITEMS = '/cdn/%s/data/%s/item.json';

    public function __construct(
        private readonly RiotApiDataDragonClient $riotApiDataDragon,
        private readonly ItemTransformer $itemTransformer,
    ) {
    }

    public function getItems(string $version, string $locale = 'fr_FR'): array
    {
        return $this->riotApiDataDragon->get(\sprintf(self::URL_ITEMS, $version, $locale))->toArray();
    }

    public function getItemsAsCollection(string $version, string $locale = 'fr_FR'): ItemCollection
    {
        $itemsData = $this->riotApiDataDragon->get(\sprintf(self::URL_ITEMS, $version, $locale))->toArray();

        return $this->itemTransformer->transformToCollection($itemsData);
    }
}
