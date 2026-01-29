<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Dto;

final class ChampionMasteryCollection implements \IteratorAggregate, \Countable
{
    /**
     * @param ChampionMastery[] $championMasteries
     */
    public function __construct(
        private readonly array $championMasteries = [],
    ) {
    }

    /**
     * @return \ArrayIterator<ChampionMastery>
     */
    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->championMasteries);
    }

    public function count(): int
    {
        return \count($this->championMasteries);
    }
}
