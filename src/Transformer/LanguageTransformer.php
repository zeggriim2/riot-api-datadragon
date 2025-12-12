<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Transformer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Language\LanguageCollection;

final class LanguageTransformer
{
    public function __construct(
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function transformToCollection(array $data): LanguageCollection
    {
        return $this->denormalizer->denormalize($data, LanguageCollection::class);
    }
}
