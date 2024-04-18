<?php
declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint;

use Zeggriim\RiotApiDataDragon\RiotApiDataDragon;

class LanguageApi implements LanguageApiInterface
{
    private const URL_LANGUAGES = '/cdn/languages.json';
    public function __construct(
        private readonly RiotApiDataDragon $riotApiDataDragon
    ) {}

    public function getLanguages(): array
    {
        return $this->riotApiDataDragon->get(self::URL_LANGUAGES);
    }
}
