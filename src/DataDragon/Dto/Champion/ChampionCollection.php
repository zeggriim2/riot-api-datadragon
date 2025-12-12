<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Dto\Champion;

final class ChampionCollection implements \IteratorAggregate, \Countable
{
    /**
     * @param Champion[] $champions
     */
    public function __construct(
        public readonly string $type,
        public readonly string $format,
        public readonly string $version,
        private readonly array $champions = [],
    ) {
    }

    /**
     * @return Champion[]
     */
    public function getChampions(): array
    {
        return $this->champions;
    }

    public function getChampion(string $name): ?Champion
    {
        return $this->champions[$name] ?? null;
    }

    public function getByRole(string $role): array
    {
        return array_filter(
            $this->champions,
            static fn (Champion $champion) => \in_array($role, $champion->tags, true)
        );
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->champions);
    }

    public function count(): int
    {
        return \count($this->champions);
    }
}
