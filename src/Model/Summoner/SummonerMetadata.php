<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model\Summoner;

class SummonerMetadata
{
    private string $type;
    private string $version;
    private Summoners $data;

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function getData(): Summoners
    {
        return $this->data;
    }

    public function setData(Summoners $data): void
    {
        $this->data = $data;
    }
}
