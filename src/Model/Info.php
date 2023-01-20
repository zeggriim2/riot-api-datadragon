<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model;

class Info
{
    private int $attack;
    private int $defense;
    private int $magic;
    private int $difficulty;

    public function getAttack(): int
    {
        return $this->attack;
    }

    public function setAttack(int $attack): void
    {
        $this->attack = $attack;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function setDefense(int $defense): void
    {
        $this->defense = $defense;
    }

    public function getMagic(): int
    {
        return $this->magic;
    }

    public function setMagic(int $magic): void
    {
        $this->magic = $magic;
    }

    public function getDifficulty(): int
    {
        return $this->difficulty;
    }

    public function setDifficulty(int $difficulty): void
    {
        $this->difficulty = $difficulty;
    }
}