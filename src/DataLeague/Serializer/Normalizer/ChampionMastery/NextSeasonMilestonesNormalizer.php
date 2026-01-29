<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Serializer\Normalizer\ChampionMastery;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\NextSeasonMilestones;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\RewardConfig;

final class NextSeasonMilestonesNormalizer implements DenormalizerAwareInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return NextSeasonMilestones::class === $type;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): NextSeasonMilestones
    {
        return new NextSeasonMilestones(
            requireGradeCounts: $data['requireGradeCounts'],
            rewardMarks: $data['rewardMarks'],
            bonus: $data['bonus'],
            rewardConfig: isset($data['rewardConfig']) ? $this->denormalizer->denormalize($data['rewardConfig'], RewardConfig::class, $format, $context) : null,
        );
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            NextSeasonMilestones::class => true,
        ];
    }
}
