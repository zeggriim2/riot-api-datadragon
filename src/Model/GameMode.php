<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model;

class GameMode
{
    private string $gameMode;
    private string $description;

    public function getGameMode(): string
    {
        return $this->gameMode;
    }

    public function setGameMode(string $gameMode): void
    {
        $this->gameMode = $gameMode;
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
