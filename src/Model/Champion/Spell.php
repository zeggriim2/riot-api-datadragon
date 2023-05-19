<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model\Champion;

use Zeggriim\RiotApiDatadragon\Model\General\Image;

class Spell
{
    private string $id;
    private string $name;
    private string $description;
    private string $tooltip;
    private Leveltip $leveltip;
    private int $maxrank;
    /** @var array<array-key,int>  */
    private array  $cooldown;
    private string $cooldownBurn;
    /** @var array<array-key,int>  */
    private array $cost;
    private string $costBurn;
    private array $datavalues;
    private array $effect;
    private array $effectBurn;
    private array $vars;
    private string $costType;
    private string $maxammo;
    /** @var array<array-key,int>  */
    private array $range;
    private string $rangeBurn;
    private Image $image;
    private string $resource;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getTooltip(): string
    {
        return $this->tooltip;
    }

    public function setTooltip(string $tooltip): void
    {
        $this->tooltip = $tooltip;
    }

    public function getLeveltip(): Leveltip
    {
        return $this->leveltip;
    }

    public function setLeveltip(Leveltip $leveltip): void
    {
        $this->leveltip = $leveltip;
    }

    public function getMaxrank(): int
    {
        return $this->maxrank;
    }

    public function setMaxrank(int $maxrank): void
    {
        $this->maxrank = $maxrank;
    }

    public function getCooldown(): array
    {
        return $this->cooldown;
    }

    public function setCooldown(array $cooldown): void
    {
        $this->cooldown = $cooldown;
    }

    public function getCooldownBurn(): string
    {
        return $this->cooldownBurn;
    }

    public function setCooldownBurn(string $cooldownBurn): void
    {
        $this->cooldownBurn = $cooldownBurn;
    }

    public function getCost(): array
    {
        return $this->cost;
    }

    public function setCost(array $cost): void
    {
        $this->cost = $cost;
    }

    public function getCostBurn(): string
    {
        return $this->costBurn;
    }

    public function setCostBurn(string $costBurn): void
    {
        $this->costBurn = $costBurn;
    }

    public function getDatavalues(): array
    {
        return $this->datavalues;
    }

    public function setDatavalues(array $datavalues): void
    {
        $this->datavalues = $datavalues;
    }

    public function getEffect(): array
    {
        return $this->effect;
    }

    public function setEffect(array $effect): void
    {
        $this->effect = $effect;
    }

    public function getEffectBurn(): array
    {
        return $this->effectBurn;
    }

    public function setEffectBurn(array $effectBurn): void
    {
        $this->effectBurn = $effectBurn;
    }

    public function getVars(): array
    {
        return $this->vars;
    }

    public function setVars(array $vars): void
    {
        $this->vars = $vars;
    }

    public function getCostType(): string
    {
        return $this->costType;
    }

    public function setCostType(string $costType): void
    {
        $this->costType = $costType;
    }

    public function getMaxammo(): string
    {
        return $this->maxammo;
    }

    public function setMaxammo(string $maxammo): void
    {
        $this->maxammo = $maxammo;
    }

    public function getRange(): array
    {
        return $this->range;
    }

    public function setRange(array $range): void
    {
        $this->range = $range;
    }

    public function getRangeBurn(): string
    {
        return $this->rangeBurn;
    }

    public function setRangeBurn(string $rangeBurn): void
    {
        $this->rangeBurn = $rangeBurn;
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): void
    {
        $this->image = $image;
    }

    public function getResource(): string
    {
        return $this->resource;
    }

    public function setResource(string $resource): void
    {
        $this->resource = $resource;
    }
}
