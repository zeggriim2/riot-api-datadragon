<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Dto\Champion;

use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Image;

final class Champion
{
    public function __construct(
        public readonly ?string $version = null,
        public readonly ?string $id = null,
        public readonly ?string $key = null,
        public readonly ?string $name = null,
        public readonly ?string $title = null,
        public readonly ?string $blurb = null,
        public readonly ?string $lore = null,
        public readonly ?string $partype = null,
        public readonly ?ChampionInfo $info = null,
        public readonly ?Image $image = null,
        public readonly ?ChampionStats $stats = null,
        public readonly ?ChampionPassive $passive = null,
        /**
         * @var string[]
         */
        public readonly array $tags = [],
        /**
         * @var string[]
         */
        public readonly array $allytips = [],
        /**
         * @var string[]
         */
        public readonly array $enemytips = [],
        /**
         * @var ChampionSkin[]
         */
        public readonly array $skins = [],

        public readonly array $spells = [],
    ) {
    }
}
