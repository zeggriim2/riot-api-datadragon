<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Transformer;

use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\ChampionMastery;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\ChampionMasteryCollection;

final class ChampionMasteryTransformer
{
    public function __construct(
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function transformToChampionMastery(array $championMastery): ChampionMastery
    {
        return $this->denormalizer->denormalize($championMastery, ChampionMastery::class, context: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true]);
    }

    public function transformToChampionMasteryCollection(array $championMasteries): ChampionMasteryCollection
    {
        return $this->denormalizer->denormalize($championMasteries, ChampionMasteryCollection::class, context: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true]);
    }
}
