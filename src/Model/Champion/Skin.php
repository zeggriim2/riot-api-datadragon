<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model\Champion;

class Skin
{
    private string  $id;
    private int     $num;
    private string  $name;
    private bool    $chromas;

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getNum(): int
    {
        return $this->num;
    }

    public function setNum(int $num): void
    {
        $this->num = $num;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function isChromas(): bool
    {
        return $this->chromas;
    }

    public function setChromas(bool $chromas): void
    {
        $this->chromas = $chromas;
    }
}
