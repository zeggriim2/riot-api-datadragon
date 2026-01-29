<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Endpoint;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Item\ItemCollection;
use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;

class ItemApi implements ItemApiInterface
{
    private const URL_ITEMS = '/cdn/%s/data/%s/item.json';

    public function __construct(
        private readonly RiotApiDataDragonClient $riotApiDataDragon,
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function getItems(string $version, string $locale = 'fr_FR'): array
    {
        return $this->riotApiDataDragon->get(\sprintf(self::URL_ITEMS, $version, $locale))->toArray();
    }

    public function getItemsAsCollection(string $version, string $locale = 'fr_FR'): ItemCollection
    {
        $itemsData = $this->riotApiDataDragon->get(\sprintf(self::URL_ITEMS, $version, $locale))->toArray();

        return $this->denormalizer->denormalize($itemsData, ItemCollection::class);
    }
}
