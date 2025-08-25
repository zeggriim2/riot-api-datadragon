<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Serializer\Normalizer\Item;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\Dto\Item\Item;
use Zeggriim\RiotApiDataDragon\Dto\Item\ItemCollection;

final class ItemCollectionNormalizer implements DenormalizerAwareInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ItemCollection::class === $type;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        $items = [];
        foreach ($data['data'] as $key => $itemData) {
            $items[$key] = $this->denormalizer->denormalize($itemData, Item::class);
        }

        return new ItemCollection(
            $data['type'],
            $data['version'],
            $data['basic'],
            $items,
            $data['groups'],
            $data['tree']
        );
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            ItemCollection::class => true,
        ];
    }
}
