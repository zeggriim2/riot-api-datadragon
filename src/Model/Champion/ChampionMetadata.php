<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model\Champion;

class ChampionMetadata
{
    private string $type;
    private string $format;
    private string $version;
    private Champions $data;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getFormat(): string
    {
        return $this->format;
    }

    public function setFormat(string $format): void
    {
        $this->format = $format;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function getData(): Champions
    {
        return $this->data;
    }

    public function setData(Champions $data): void
    {
        $this->data = $data;
    }
}
