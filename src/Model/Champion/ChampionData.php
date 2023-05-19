<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model\Champion;

use Zeggriim\RiotApiDatadragon\Model\General\Image;
use Zeggriim\RiotApiDatadragon\Model\General\Info;

class ChampionData
{
    private string $version;
    private string $id;
    private int $key;
    private string $name;
    private string $title;
    private string $blurb;
    private Info $info;
    private Image $image;

    /**
     * @var array<array-key,string>
     */
    private array $tags;
    private string $partype;
    private Stats $stats;

    public function getVersion(): string
    {
        return $this->version;
    }

    public function setVersion(string $version): void
    {
        $this->version = $version;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function getKey(): int
    {
        return $this->key;
    }

    public function setKey(int|string $key): void
    {
        $this->key = (int) $key;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getBlurb(): string
    {
        return $this->blurb;
    }

    public function setBlurb(string $blurb): void
    {
        $this->blurb = $blurb;
    }

    public function getInfo(): Info
    {
        return $this->info;
    }

    public function setInfo(Info $info): void
    {
        $this->info = $info;
    }

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): void
    {
        $this->image = $image;
    }

    /**
     * @return array<array-key,string>
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @param array<array-key,string> $tags
     */
    public function setTags(array $tags): void
    {
        $this->tags = $tags;
    }

    public function getPartype(): string
    {
        return $this->partype;
    }

    public function setPartype(string $partype): void
    {
        $this->partype = $partype;
    }

    public function getStats(): Stats
    {
        return $this->stats;
    }

    public function setStats(Stats $stats): void
    {
        $this->stats = $stats;
    }
}
