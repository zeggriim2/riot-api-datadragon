<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\Dto\Champion\Champion;
use Zeggriim\RiotApiDataDragon\Dto\Champion\ChampionCollection;

final class ChampionCollectionNormalizer implements DenormalizerAwareInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ChampionCollection::class === $type;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): ChampionCollection
    {
        $champions = [];
        foreach ($data['data'] as $championName => $championData) {
            $champions[$championName] = $this->denormalizer->denormalize(
                $championData,
                Champion::class,
                $format,
                $context
            );
        }

        return new ChampionCollection(
            type: $data['type'],
            format: $data['format'],
            version: $data['version'],
            champions: $champions
        );
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            ChampionCollection::class => true,
        ];
    }
}
