<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Dto\Language;

final class Language
{
    public function __construct(
        public readonly string $code,
    ) {
    }
}
