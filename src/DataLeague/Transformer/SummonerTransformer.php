<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Transformer;

use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\Summoner;

final class SummonerTransformer
{
    public function __construct(
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function transformToSummoner(array $summoner): Summoner
    {
        return $this->denormalizer->denormalize($summoner, Summoner::class, context: [AbstractObjectNormalizer::DISABLE_TYPE_ENFORCEMENT => true]);
    }
}
