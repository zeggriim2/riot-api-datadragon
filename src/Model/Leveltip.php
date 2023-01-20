<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model;

class Leveltip
{
    /** @var array<array-key,string> */
    private array $label;
    /** @var array<array-key,string> */
    private array $effect;

    public function getLabel(): array
    {
        return $this->label;
    }

    public function setLabel(array $label): void
    {
        $this->label = $label;
    }

    public function getEffect(): array
    {
        return $this->effect;
    }

    public function setEffect(array $effect): void
    {
        $this->effect = $effect;
    }
}