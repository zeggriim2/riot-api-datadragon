<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Serializer\Normalizer\Summoner;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Summoner\Summoner;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Summoner\SummonerCollection;

final class SummonerCollectionNormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): SummonerCollection
    {
        $summoners = [];
        foreach ($data['data'] as $summonerName => $summoner) {
            $summoners[$summonerName] = $this->denormalizer->denormalize($summoner, Summoner::class, $format, $context);
        }

        return new SummonerCollection(
            $data['type'],
            $data['version'],
            $summoners,
        );
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return SummonerCollection::class === $type;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [SummonerCollection::class => true];
    }
}
