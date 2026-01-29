<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Dto\Item;

final class ItemCollection implements \IteratorAggregate, \Countable
{
    public function __construct(
        public readonly string $type,
        public readonly string $version,
        public readonly array $basic,
        /**
         * @var Item[]
         */
        public readonly array $items,
        public readonly array $groups,
        public readonly array $tree,
    ) {
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->items);
    }

    public function count(): int
    {
        return \count($this->items);
    }
}
