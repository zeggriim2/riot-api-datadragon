<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\Dto\ProfileIcon\ProfileIcon;
use Zeggriim\RiotApiDataDragon\Dto\ProfileIcon\ProfileIconCollection;

final class ProfileIconCollectionNormalizer implements DenormalizerAwareInterface, DenormalizerInterface
{
    use DenormalizerAwareTrait;

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): ProfileIconCollection
    {
        $profileIcons = [];
        foreach ($data['data'] as $profileIcon) {
            $profileIcons[] = $this->denormalizer->denormalize($profileIcon, ProfileIcon::class);
        }

        return new ProfileIconCollection(
            $data['type'],
            $data['version'],
            $profileIcons
        );
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ProfileIconCollection::class === $type;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            ProfileIconCollection::class => true,
        ];
    }
}
