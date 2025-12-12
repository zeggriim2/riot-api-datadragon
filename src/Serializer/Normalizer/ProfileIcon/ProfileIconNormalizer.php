<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Serializer\Normalizer\ProfileIcon;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\ProfileIcon\ProfileIcon;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\ProfileIcon\ProfileIconImage;

final class ProfileIconNormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): mixed
    {
        return new ProfileIcon(
            $data['id'],
            isset($data['image']) ? $this->denormalizer->denormalize($data['image'], ProfileIconImage::class, $format, $context) : null,
        );
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return ProfileIcon::class === $type;
    }

    public function getSupportedTypes(?string $format): array
    {
        return [ProfileIcon::class => true];
    }
}
