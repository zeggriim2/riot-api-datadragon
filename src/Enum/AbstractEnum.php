<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Enum;

abstract class AbstractEnum
{
    private function __construct()
    {
        throw new \RuntimeException(__METHOD__ . " must not be called; only public constants have to be used");
    }
}
