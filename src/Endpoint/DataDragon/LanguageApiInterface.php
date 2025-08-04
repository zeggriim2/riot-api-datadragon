<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

use Zeggriim\RiotApiDataDragon\Dto\Language\LanguageCollection;

interface LanguageApiInterface
{
    public function getLanguages(): array;

    public function getLanguagesAsCollection(): LanguageCollection;
}
