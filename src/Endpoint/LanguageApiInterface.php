<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint;

interface LanguageApiInterface
{
    public function getLanguages(): array;
}
