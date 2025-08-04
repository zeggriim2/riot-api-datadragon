<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Transformer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\Dto\Champion\Champion;
use Zeggriim\RiotApiDataDragon\Dto\Champion\ChampionCollection;

final class ChampionTransformer
{
    public function __construct(
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function transformToCollection(array $championsData): ChampionCollection
    {
        return $this->denormalizer->denormalize($championsData, ChampionCollection::class);
    }

    public function transformToChampion(array $championData): Champion
    {
        // Pour un champion unique, on prend la première entrée du data
        $firstChampion = reset($championData['data']);

        return $this->denormalizer->denormalize($firstChampion, Champion::class);
    }
}
