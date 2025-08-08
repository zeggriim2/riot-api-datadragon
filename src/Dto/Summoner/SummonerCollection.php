<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Dto\Summoner;

final readonly class SummonerCollection implements \Countable
{
    /**
     * @param Summoner[] $summoners
     */
    public function __construct(
        public string $type,
        public string $version,
        public array $summoners,
    ) {
    }

    public function count(): int
    {
        return \count($this->summoners);
    }
}
