<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Serializer\Normalizer;

use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Language\Language;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Language\LanguageCollection;

final class LanguageCollectionNormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    use DenormalizerAwareTrait;

    /**
     * @param array<string, string> $data
     */
    public function denormalize(mixed $data, string $type, ?string $format = null, array $context = []): LanguageCollection
    {
        $collection = new LanguageCollection();

        foreach ($data as $code) {
            $language = new Language($code);
            $collection->addLanguage($language);
        }

        return $collection;
    }

    public function supportsDenormalization(mixed $data, string $type, ?string $format = null, array $context = []): bool
    {
        return LanguageCollection::class === $type && \is_array($data);
    }

    public function getSupportedTypes(?string $format): array
    {
        return [
            LanguageCollection::class => true,
        ];
    }
}
