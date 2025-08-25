<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Serializer\Normalizer\Summoner;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\Dto\Image;
use Zeggriim\RiotApiDataDragon\Dto\Summoner\Summoner;

final class SummonerNormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        return new Summoner(
            id: $data['id'],
            name: $data['name'],
            description: $data['description'],
            tooltip: $data['tooltip'],
            maxrank: $data['maxrank'],
            cooldown: $data['cooldown'],
            cooldownBurn: $data['cooldownBurn'],
            cost: $data['cost'],
            costBurn: $data['costBurn'],
            effect: $data['effect'],
            effectBurn: $data['effectBurn'],
            vars: $data['vars'],
            key: $data['key'],
            summonerLevel: $data['summonerLevel'],
            modes: $data['modes'],
            costType: $data['costType'],
            maxammo: $data['maxammo'],
            range: $data['range'],
            rangeBurn: $data['rangeBurn'],
            resource: $data['resource'],
            image: isset($data['image']) ? $this->denormalizer->denormalize($data['image'], Image::class, $format, $context) : null
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
