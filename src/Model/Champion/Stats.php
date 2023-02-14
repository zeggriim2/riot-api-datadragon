<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model\Champion;

class Stats
{
    private int $hp;
    private int $hpperlevel;
    private int|float $mp;
    private int|float $mpperlevel;
    private int $movespeed;
    private int $armor;
    private int|float $armorperlevel;
    private int|float $spellblock;
    private float $spellblockperlevel;
    private int $attackrange;
    private int|float $hpregen;
    private int|float $hpregenperlevel;
    private int|float $mpregen;
    private int|float $mpregenperlevel;
    private int $crit;
    private int $critperlevel;
    private int $attackdamage;
    private int|float $attackdamageperlevel;
    private int|float $attackspeedperlevel;
    private float $attackspeed;

    public function getHp(): int
    {
        return $this->hp;
    }

    public function setHp(int $hp): void
    {
        $this->hp = $hp;
    }

    public function getHpperlevel(): int
    {
        return $this->hpperlevel;
    }

    public function setHpperlevel(int $hpperlevel): void
    {
        $this->hpperlevel = $hpperlevel;
    }

    public function getMp(): int|float
    {
        return $this->mp;
    }

    public function setMp(int|float $mp): void
    {
        $this->mp = $mp;
    }

    public function getMpperlevel(): int|float
    {
        return $this->mpperlevel;
    }

    public function setMpperlevel(int|float $mpperlevel): void
    {
        $this->mpperlevel = $mpperlevel;
    }

    public function getMovespeed(): int
    {
        return $this->movespeed;
    }

    public function setMovespeed(int $movespeed): void
    {
        $this->movespeed = $movespeed;
    }

    public function getArmor(): int
    {
        return $this->armor;
    }

    public function setArmor(int $armor): void
    {
        $this->armor = $armor;
    }

    public function getArmorperlevel(): int|float
    {
        return $this->armorperlevel;
    }

    public function setArmorperlevel(int|float $armorperlevel): void
    {
        $this->armorperlevel = $armorperlevel;
    }

    public function getSpellblock(): int|float
    {
        return $this->spellblock;
    }

    public function setSpellblock(int|float $spellblock): void
    {
        $this->spellblock = $spellblock;
    }

    public function getSpellblockperlevel(): float
    {
        return $this->spellblockperlevel;
    }

    public function setSpellblockperlevel(float $spellblockperlevel): void
    {
        $this->spellblockperlevel = $spellblockperlevel;
    }

    public function getAttackrange(): int
    {
        return $this->attackrange;
    }

    public function setAttackrange(int $attackrange): void
    {
        $this->attackrange = $attackrange;
    }

    public function getHpregen(): int|float
    {
        return $this->hpregen;
    }

    public function setHpregen(int|float $hpregen): void
    {
        $this->hpregen = $hpregen;
    }

    public function getHpregenperlevel(): int|float
    {
        return $this->hpregenperlevel;
    }

    public function setHpregenperlevel(int|float $hpregenperlevel): void
    {
        $this->hpregenperlevel = $hpregenperlevel;
    }

    public function getMpregen(): int|float
    {
        return $this->mpregen;
    }

    public function setMpregen(int|float $mpregen): void
    {
        $this->mpregen = $mpregen;
    }

    public function getMpregenperlevel(): int|float
    {
        return $this->mpregenperlevel;
    }

    public function setMpregenperlevel(int|float $mpregenperlevel): void
    {
        $this->mpregenperlevel = $mpregenperlevel;
    }

    public function getCrit(): int
    {
        return $this->crit;
    }

    public function setCrit(int $crit): void
    {
        $this->crit = $crit;
    }

    public function getCritperlevel(): int
    {
        return $this->critperlevel;
    }

    public function setCritperlevel(int $critperlevel): void
    {
        $this->critperlevel = $critperlevel;
    }

    public function getAttackdamage(): int
    {
        return $this->attackdamage;
    }

    public function setAttackdamage(int $attackdamage): void
    {
        $this->attackdamage = $attackdamage;
    }

    public function getAttackdamageperlevel(): int|float
    {
        return $this->attackdamageperlevel;
    }

    public function setAttackdamageperlevel(int|float $attackdamageperlevel): void
    {
        $this->attackdamageperlevel = $attackdamageperlevel;
    }

    public function getAttackspeedperlevel(): int|float
    {
        return $this->attackspeedperlevel;
    }

    public function setAttackspeedperlevel(int|float $attackspeedperlevel): void
    {
        $this->attackspeedperlevel = $attackspeedperlevel;
    }

    public function getAttackspeed(): float
    {
        return $this->attackspeed;
    }

    public function setAttackspeed(float $attackspeed): void
    {
        $this->attackspeed = $attackspeed;
    }
}
