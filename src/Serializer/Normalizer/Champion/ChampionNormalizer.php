<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Serializer\Normalizer\Champion;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\Dto\Champion\Champion;
use Zeggriim\RiotApiDataDragon\Dto\Champion\ChampionImage;
use Zeggriim\RiotApiDataDragon\Dto\Champion\ChampionInfo;
use Zeggriim\RiotApiDataDragon\Dto\Champion\ChampionPassive;
use Zeggriim\RiotApiDataDragon\Dto\Champion\ChampionSkin;
use Zeggriim\RiotApiDataDragon\Dto\Champion\ChampionStats;

final class ChampionNormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return Champion::class === $type;
    }

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): Champion
    {
        return new Champion(
            version: $data['version'] ?? null,
            id: $data['id'] ?? null,
            key: $data['key'] ?? null,
            name: $data['name'] ?? null,
            title: $data['title'] ?? null,
            blurb: $data['blurb'] ?? null,
            lore: $data['lore'] ?? null,
            partype: $data['partype'] ?? null,
            info: isset($data['info']) ? $this->denormalizer->denormalize($data['info'], ChampionInfo::class, $format, $context) : null,
            image: isset($data['image']) ? $this->denormalizer->denormalize($data['image'], ChampionImage::class, $format, $context) : null,
            stats: isset($data['stats']) ? $this->denormalizer->denormalize($data['stats'], ChampionStats::class, $format, $context) : null,
            passive: isset($data['passive']) ? $this->denormalizer->denormalize($data['passive'], ChampionPassive::class, $format, $context) : null,
            tags: $data['tags'] ?? [],
            allytips: $data['allytips'] ?? [],
            enemytips: $data['enemytips'] ?? [],
            skins: isset($data['skins']) ? $this->denormalizeSkins($data['skins'], $format, $context) : [],
            spells: $data['spells'] ?? [],
        );
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            Champion::class => true,
        ];
    }

    private function denormalizeSkins(array $skinsData, ?string $format, array $context): array
    {
        $skins = [];
        foreach ($skinsData as $skinData) {
            $skins[] = $this->denormalizer->denormalize($skinData, ChampionSkin::class, $format, $context);
        }

        return $skins;
    }
}
