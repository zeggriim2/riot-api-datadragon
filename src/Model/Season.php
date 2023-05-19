<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model;

class Season
{
    private int $id;
    private string $season;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getSeason(): string
    {
        return $this->season;
    }

    public function setSeason(string $season): void
    {
        $this->season = $season;
    }
}
