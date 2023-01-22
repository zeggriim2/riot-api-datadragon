<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model\Item;

use Zeggriim\RiotApiDatadragon\Model\General\Image;

class Item
{
    private string $name;
    private string $description;
    private string $colloq;
    private string $plaintext;
    /** @var array<array-key,string>  */
    private array $into;
    private Image $image;
    private Gold $gold;
    /** @var array<array-key,string>  */
    private array $tags;
    /** @var array<string,string>  */
    private array $maps;
    /** @var array<array-key,int|float>  */
    private array $stats;
    /** @var array<string,string>  */
    private array $effect;

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

    public function getColloq(): string
    {
        return $this->colloq;
    }

    public function setColloq(string $colloq): void
    {
        $this->colloq = $colloq;
    }

    public function getPlaintext(): string
    {
        return $this->plaintext;
    }

    public function setPlaintext(string $plaintext): void
    {
        $this->plaintext = $plaintext;
    }

    public function getInto(): array
    {
        return $this->into;
    }

    public function setInto(array $into): void
    {
        $this->into = $into;
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): void
    {
        $this->image = $image;
    }

    public function getGold(): Gold
    {
        return $this->gold;
    }

    public function setGold(Gold $gold): void
    {
        $this->gold = $gold;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    public function getMaps(): array
    {
        return $this->maps;
    }

    public function setMaps(array $maps): void
    {
        $this->maps = $maps;
    }

    public function getStats(): array
    {
        return $this->stats;
    }

    public function setStats(array $stats): void
    {
        $this->stats = $stats;
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