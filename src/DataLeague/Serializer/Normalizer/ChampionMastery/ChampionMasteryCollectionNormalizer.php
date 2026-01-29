<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Serializer\Normalizer\ChampionMastery;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\ChampionMastery;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\ChampionMasteryCollection;

final class ChampionMasteryCollectionNormalizer implements DenormalizerAwareInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ChampionMasteryCollection::class === $type;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): ChampionMasteryCollection
    {
        $championMasteries = [];
        foreach ($data as $championMastery) {
            $championMasteries[] = $this->denormalizer->denormalize(
                $championMastery,
                ChampionMastery::class,
                $format,
                $context
            );
        }

        return new ChampionMasteryCollection($championMasteries);
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            ChampionMasteryCollection::class => true,
        ];
    }
}
