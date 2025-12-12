<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Transformer;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\ProfileIcon\ProfileIconCollection;

final class ProfileIconTransformer
{
    public function __construct(
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function transformToCollection(array $data): ProfileIconCollection
    {
        return $this->denormalizer->denormalize($data, ProfileIconCollection::class);
    }
}
