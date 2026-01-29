<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Serializer\Normalizer\Summoner;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\Summoner;

final class SummonerNormalizer implements DenormalizerAwareInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return Summoner::class === $type;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): Summoner
    {
        return new Summoner(
            puuid: $data['puuid'],
            revisionDate: $data['revisionDate'],
            profileIconId: $data['profileIconId'],
            summonerLevel: $data['summonerLevel'],
        );
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            Summoner::class => true,
        ];
    }
}
