<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Serializer\Normalizer\ChampionMastery;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\ChampionMastery;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\NextSeasonMilestones;

final class ChampionMasteryNormalizer implements DenormalizerAwareInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait;

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ChampionMastery::class === $type;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): ChampionMastery
    {
        $lastPlayTime = \DateTimeImmutable::createFromFormat(
            'U.u',
            \sprintf('%.3f', $data['lastPlayTime'] / 1000),
            new \DateTimeZone('UTC') // Riot = UTC
        );

        return new ChampionMastery(
            puuid: $data['puuid'],
            championPointsUntilNextLevel: $data['championPointsUntilNextLevel'],
            championId: $data['championId'],
            lastPlayTime: false !== $lastPlayTime ? $lastPlayTime : null,
            championLevel: $data['championLevel'],
            championPoints: $data['championPoints'],
            championPointsSinceLastLevel: $data['championPointsSinceLastLevel'],
            markRequiredForNextLevel: $data['markRequiredForNextLevel'],
            championSeasonMilestone: $data['championSeasonMilestone'],
            nextSeasonMilestone: isset($data['nextSeasonMilestone']) ? $this->denormalizer->denormalize($data['nextSeasonMilestone'], NextSeasonMilestones::class, $format, $context) : null,
            tokensEarned: $data['tokensEarned'],
            milestoneGrades: $data['milestoneGrades'] ?? [],
            chestGranted: $data['chestGranted'] ?? false,
        );
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            ChampionMastery::class => true,
        ];
    }
}
