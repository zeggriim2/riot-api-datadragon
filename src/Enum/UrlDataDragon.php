<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Enum;

class UrlDataDragon extends AbstractEnum
{
    private const URL_HOST = "https://ddragon.leagueoflegends.com/";
    public const URL_VERSIONS = self::URL_HOST . "api/versions.json";
    public const URL_LANGUAGES = self::URL_HOST . "cdn/languages.json";
    public const URL_CHAMPIONS = self::URL_HOST . "cdn/{version}/data/{lang}/champion.json";
}