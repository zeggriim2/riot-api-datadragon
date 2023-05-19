<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model;

class Map
{
    private int $mapId;
    private string $mapName;
    private string $notes;

    public function getMapId(): int
    {
        return $this->mapId;
    }

    public function setMapId(int $mapId): void
    {
        $this->mapId = $mapId;
    }

    public function getMapName(): string
    {
        return $this->mapName;
    }

    public function setMapName(string $mapName): void
    {
        $this->mapName = $mapName;
    }

    public function getNotes(): string
    {
        return $this->notes;
    }

    public function setNotes(string $notes): void
    {
        $this->notes = $notes;
    }
}