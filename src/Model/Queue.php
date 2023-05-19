<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model;

class Queue
{
    private int $queueId;
    private string $map;
    private ?string $description;
    private ?string $notes;

    public function getQueueId(): int
    {
        return $this->queueId;
    }

    public function setQueueId(int $queueId): void
    {
        $this->queueId = $queueId;
    }

    public function getMap(): string
    {
        return $this->map;
    }

    public function setMap(string $map): void
    {
        $this->map = $map;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): void
    {
        $this->notes = $notes;
    }
}