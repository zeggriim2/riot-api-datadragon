<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Transformer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Item\ItemCollection;

final class ItemTransformer
{
    public function __construct(
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function transformToCollection(array $itemsData): ItemCollection
    {
        return $this->denormalizer->denormalize($itemsData, ItemCollection::class);
    }
}
