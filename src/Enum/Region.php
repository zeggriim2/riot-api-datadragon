<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Enum;

class Region extends AbstractEnum
{
    public const AMERICAS = "AMERICAS";
    public const ASIA = "ASIA";
    public const EUROPE = "EUROPE";
    public const SEA = "SEA";

    public const HOST = ".api.riotgames.com";
    public const HOS_AMERICAS = self::HOST . self::HOST;
    public const HOS_ASIA = self::ASIA . self::HOST;
    public const HOS_EUROPE = self::EUROPE . self::HOST;
    public const HOS_SEA = self::SEA . self::HOST;
}