<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Serializer\Normalizer\Item;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\Dto\Image;
use Zeggriim\RiotApiDataDragon\Dto\Item\Gold;
use Zeggriim\RiotApiDataDragon\Dto\Item\Item;

final class ItemNormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Item::class === $type;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        return new Item(
            name: $data['name'],
            description: $data['description'],
            colloq: $data['colloq'],
            image: $this->denormalizer->denormalize($data['image'], Image::class, $format, $context),
            gold: $this->denormalizer->denormalize($data['gold'], Gold::class, $format, $context),
            tags: $data['tags'],
            maps: $data['maps'],
            stats: $data['stats'],
            into: $data['into'] ?? null,
            from: $data['from'] ?? null,
            plaintext: $data['plaintext'] ?? null,
            depth: $data['depth'] ?? null,
        );
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            Item::class => true,
        ];
    }
}
