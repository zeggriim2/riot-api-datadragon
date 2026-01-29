<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Serializer\Normalizer\ChampionMastery;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\RewardConfig;

final class RewardConfigNormalizer implements DenormalizerAwareInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return RewardConfig::class === $type;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): RewardConfig
    {
        return new RewardConfig(
            rewardValue: $data['rewardValue'],
            rewardType: $data['rewardType'],
            maximumReward: $data['maximumReward']
        );
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            RewardConfig::class => true,
        ];
    }
}
