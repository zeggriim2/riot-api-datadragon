<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Endpoint;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Language\LanguageCollection;
use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;

class LanguageApi implements LanguageApiInterface
{
    private const URL_LANGUAGES = '/cdn/languages.json';

    public function __construct(
        private readonly RiotApiDataDragonClient $riotApiDataDragon,
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function getLanguages(): array
    {
        return $this->riotApiDataDragon->get(self::URL_LANGUAGES)->toArray();
    }

    public function getLanguagesAsCollection(): LanguageCollection
    {
        $data = $this->getLanguages();

        return $this->denormalizer->denormalize($data, LanguageCollection::class);
    }
}
