<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Model\Item;

class Gold
{
    private int $base;
    private bool $purchasable;
    private int $total;
    private int $sell;

    public function getBase(): int
    {
        return $this->base;
    }

    public function setBase(int $base): void
    {
        $this->base = $base;
    }

    public function isPurchasable(): bool
    {
        return $this->purchasable;
    }

    public function setPurchasable(bool $purchasable): void
    {
        $this->purchasable = $purchasable;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    public function getSell(): int
    {
        return $this->sell;
    }

    public function setSell(int $sell): void
    {
        $this->sell = $sell;
    }
}
