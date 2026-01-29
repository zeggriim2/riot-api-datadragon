<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Dto\Language;

final class LanguageCollection implements \Countable, \IteratorAggregate
{
    /**
     * @param Language[] $languages
     */
    public function __construct(
        private array $languages = [],
    ) {
    }

    public function addLanguage(Language $language): void
    {
        $this->languages[$language->code] = $language;
    }

    /**
     * @return Language[]
     */
    public function getLanguages(): array
    {
        return $this->languages;
    }

    public function getLanguage(string $code): ?Language
    {
        return $this->languages[$code] ?? null;
    }

    public function count(): int
    {
        return \count($this->languages);
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->languages);
    }

    public function hasLanguage(string $code): bool
    {
        return isset($this->languages[$code]);
    }
}
