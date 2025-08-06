<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Dto\ProfileIcon;

final readonly class ProfileIconCollection implements \Countable
{
    /**
     * @param ProfileIcon[] $profileIcons
     */
    public function __construct(
        public string $type,
        public string $version,
        public array $profileIcons = [],
    ) {
    }

    public function count(): int
    {
        return \count($this->profileIcons);
    }
}
