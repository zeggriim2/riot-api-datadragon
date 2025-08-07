<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Serializer\Normalizer\Summoner;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\Dto\Summoner\Summoner;
use Zeggriim\RiotApiDataDragon\Dto\Summoner\SummonerImage;

final class SummonerNormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        return new Summoner(
            $data['id'],
            $data['name'],
            $data['description'],
            $data['tooltip'],
            $data['maxrank'],
            $data['cooldown'],
            $data['cooldownBurn'],
            $data['cost'],
            $data['costBurn'],
            $data['effect'],
            $data['effectBurn'],
            $data['vars'],
            $data['key'],
            $data['summonerLevel'],
            $data['modes'],
            $data['costType'],
            $data['maxammo'],
            $data['range'],
            $data['rangeBurn'],
            $data['resource'],
            isset($data['image']) ? $this->denormalizer->denormalize($data['image'], SummonerImage::class) : null
        );
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Summoner::class === $type;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [Summoner::class => true];
    }
}