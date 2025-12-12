<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Endpoint;

use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Language\LanguageCollection;

interface LanguageApiInterface
{
    public function getLanguages(): array;

    public function getLanguagesAsCollection(): LanguageCollection;
}
