<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

use Zeggriim\RiotApiDataDragon\Dto\Language\LanguageCollection;
use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;
use Zeggriim\RiotApiDataDragon\Transformer\LanguageTransformer;

class LanguageApi implements LanguageApiInterface
{
    private const URL_LANGUAGES = '/cdn/languages.json';

    public function __construct(
        private readonly RiotApiDataDragonClient $riotApiDataDragon,
        private readonly ?LanguageTransformer $languageTransformer = null,
    ) {
    }

    public function getLanguages(): array
    {
        return $this->riotApiDataDragon->get(self::URL_LANGUAGES)->toArray();
    }

    public function getLanguagesAsCollection(): LanguageCollection
    {
        $data = $this->getLanguages();

        if (null === $this->languageTransformer) {
            throw new \RuntimeException('LanguageTransformer is required for object transformation');
        }

        return $this->languageTransformer->transformToCollection($data);
    }
}
