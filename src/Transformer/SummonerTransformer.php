<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Transformer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\Dto\ProfileIcon\ProfileIconCollection;
use Zeggriim\RiotApiDataDragon\Dto\Summoner\SummonerCollection;

final class SummonerTransformer
{
    public function __construct(
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function transformToCollection(array $data): SummonerCollection
    {
        return $this->denormalizer->denormalize($data, SummonerCollection::class);
    }
}
