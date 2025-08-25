<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Dto\Item;

use Zeggriim\RiotApiDataDragon\Dto\Image;

final class Item
{
    public function __construct(
        public readonly string $name,
        public readonly string $description,
        public readonly string $colloq,
        public readonly Image $image,
        /**
         * @var array<string, int|bool>
         */
        public readonly array $gold,
        /**
         * @var string[]
         */
        public readonly array $tags,
        /**
         * @var array<int, bool>
         */
        public readonly array $maps,
        /**
         * @var array<string, int|float>
         */
        public readonly array $stats,
        /**
         * @var string[]|null
         */
        public readonly ?array $into = null,
        /**
         * @var string[]|null
         */
        public readonly ?array $from = null,
        public readonly ?string $plaintext = null,
        public readonly ?int $depth = null,
    ) {
    }
}
