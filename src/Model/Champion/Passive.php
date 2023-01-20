<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model\Champion;

use Zeggriim\RiotApiDatadragon\Model\General\Image;

class Passive
{
    private string $name;
    private string $description;
    private Image $image;

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

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): void
    {
        $this->image = $image;
    }
}