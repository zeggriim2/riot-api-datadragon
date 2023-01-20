<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model;

class Image
{
    private string $full;
    private string $sprite;
    private string $group;
    private int $x;
    private int $y;
    private int $w;
    private int $h;

    public function getFull(): string
    {
        return $this->full;
    }

    public function setFull(string $full): void
    {
        $this->full = $full;
    }

    public function getSprite(): string
    {
        return $this->sprite;
    }

    public function setSprite(string $sprite): void
    {
        $this->sprite = $sprite;
    }

    public function getGroup(): string
    {
        return $this->group;
    }

    public function setGroup(string $group): void
    {
        $this->group = $group;
    }

    public function getX(): int
    {
        return $this->x;
    }

    public function setX(int $x): void
    {
        $this->x = $x;
    }

    public function getY(): int
    {
        return $this->y;
    }

    public function setY(int $y): void
    {
        $this->y = $y;
    }

    public function getW(): int
    {
        return $this->w;
    }

    public function setW(int $w): void
    {
        $this->w = $w;
    }

    public function getH(): int
    {
        return $this->h;
    }

    public function setH(int $h): void
    {
        $this->h = $h;
    }
}