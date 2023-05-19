<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Enum;

class Platform extends AbstractEnum
{
    public const BR     = "br";
    public const EUN1   = "eun1";
    public const EUW1   = "euw1";
    public const JP1    = "jp1";
    public const KR     = "kr";
    public const LA1    = "la1";
    public const LA2    = "la2";
    public const NA1    = "na1";
    public const OC1    = "oc1";
    public const TR1    = "tr1";
    public const RU     = "ru";
    public const PH2    = "ph2";
    public const SG2    = "sg2";
    public const TH2    = "th2";
    public const TW2    = "tw2";
    public const VN2    = "vn";


    private const HOST      = ".api.riotgames.com";
    public const HOST_BR    = self::BR . self::HOST;
    public const HOST_EUN1  = self::EUN1 . self::HOST;
    public const HOST_EUW1  = self::EUW1 . self::HOST;
    public const HOST_JP1   = self::JP1 . self::HOST;
    public const HOST_KR    = self::KR . self::HOST;
    public const HOST_LA1   = self::LA1 . self::HOST;
    public const HOST_LA2   = self::LA2 . self::HOST;
    public const HOST_NA1   = self::NA1 . self::HOST;
    public const HOST_OC1   = self::OC1 . self::HOST;
    public const HOST_TR1   = self::TR1 . self::HOST;
    public const HOST_RU    = self::RU . self::HOST;
    public const HOST_PH2   = self::PH2 . self::HOST;
    public const HOST_SG2   = self::SG2 . self::HOST;
    public const HOST_TH2   = self::TH2 . self::HOST;
    public const HOST_TW2   = self::TW2 . self::HOST;
    public const HOST_VN2   = self::VN2 . self::HOST;
}
