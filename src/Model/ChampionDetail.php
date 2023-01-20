<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model;

class ChampionDetail
{
    private string $id;
    private int $key;
    private string $name;
    private string $title;
    private Image $image;
    /** @var Skin[] */
    private array $skins;
    private string $lore;
    private string $blurb;
    /** @var array<array-key,string>  */
    private array $allytips;
    /** @var array<array-key,string>  */
    private array $enemytips;
    /** @var array<array-key,string>  */
    private array $tags;
    private string $partype;
    private Info $info;
    private Stats $stats;
    /** @var Spell[] */
    private array $spells;
    private Passive $passive;

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
        $this->key = (int)$key;
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

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): void
    {
        $this->image = $image;
    }

    public function getSkins(): array
    {
        return $this->skins;
    }

    public function setSkins(array $skins): void
    {
        $this->skins = $skins;
    }

    public function getLore(): string
    {
        return $this->lore;
    }

    public function setLore(string $lore): void
    {
        $this->lore = $lore;
    }

    public function getBlurb(): string
    {
        return $this->blurb;
    }

    public function setBlurb(string $blurb): void
    {
        $this->blurb = $blurb;
    }

    public function getAllytips(): array
    {
        return $this->allytips;
    }

    public function setAllytips(array $allytips): void
    {
        $this->allytips = $allytips;
    }

    public function getEnemytips(): array
    {
        return $this->enemytips;
    }

    public function setEnemytips(array $enemytips): void
    {
        $this->enemytips = $enemytips;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

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

    public function getInfo(): Info
    {
        return $this->info;
    }

    public function setInfo(Info $info): void
    {
        $this->info = $info;
    }

    public function getStats(): Stats
    {
        return $this->stats;
    }

    public function setStats(Stats $stats): void
    {
        $this->stats = $stats;
    }

    public function getSpells(): array
    {
        return $this->spells;
    }

    public function setSpells(array $spells): void
    {
        $this->spells = $spells;
    }

    public function getPassive(): Passive
    {
        return $this->passive;
    }

    public function setPassive(Passive $passive): void
    {
        $this->passive = $passive;
    }
}