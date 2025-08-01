<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;

class LanguageApi implements LanguageApiInterface
{
    private const URL_LANGUAGES = '/cdn/languages.json';

    public function __construct(private readonly RiotApiDataDragonClient $riotApiDataDragon)
    {
    }

    public function getLanguages(): array
    {
        return $this->riotApiDataDragon->get(self::URL_LANGUAGES)->toArray();
    }
}
