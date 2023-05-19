<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model;

class GameType
{
    private string $gametype;
    private string $description;

    public function getGametype(): string
    {
        return $this->gametype;
    }

    public function setGametype(string $gametype): void
    {
        $this->gametype = $gametype;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
