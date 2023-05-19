<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Enum;

class Region extends AbstractEnum
{
    public const AMERICAS = 'AMERICAS';
    public const ASIA     = 'ASIA';
    public const EUROPE   = 'EUROPE';
    public const SEA      = 'SEA';

    private const HOST        = '.api.riotgames.com';
    public const HOS_AMERICAS = self::HOST . self::HOST;
    public const HOS_ASIA     = self::ASIA . self::HOST;
    public const HOS_EUROPE   = self::EUROPE . self::HOST;
    public const HOS_SEA      = self::SEA . self::HOST;

    public const PLATFORM_TO_REGION = [
        Platform::EUW1 => self::EUROPE,
        Platform::EUN1 => self::EUROPE,
        Platform::TR1  => self::EUROPE,
        Platform::BR   => self::AMERICAS,
        Platform::LA1  => self::AMERICAS,
        Platform::LA2  => self::AMERICAS,
        Platform::NA1  => self::AMERICAS,
        Platform::OC1  => self::ASIA,
        Platform::JP1  => self::ASIA,
        Platform::KR   => self::ASIA,
        Platform::RU   => self::ASIA,
        Platform::PH2  => self::ASIA,
        Platform::SG2  => self::ASIA,
        Platform::TH2  => self::ASIA,
        Platform::TW2  => self::ASIA,
        Platform::VN2  => self::ASIA,
    ];
}
