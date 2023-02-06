<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Enum;

class UrlDataDragon extends AbstractEnum
{
    private const URL_HOST          = "https://ddragon.leagueoflegends.com/";
    private const URL_HOST_STATIC   = "https://static.developer.riotgames.com/docs/lol/";
    public const URL_VERSIONS       = self::URL_HOST . "api/versions.json";
    public const URL_LANGUAGES      = self::URL_HOST . "cdn/languages.json";
    public const URL_CHAMPIONS      = self::URL_HOST . "cdn/{version}/data/{lang}/champion.json";
    public const URL_CHAMPION       = self::URL_HOST . "cdn/{version}/data/{lang}/champion/{name}.json";
    public const URL_ITEMS          = self::URL_HOST . "cdn/{version}/data/{lang}/item.json";
    public const URL_SUMMONER       = self::URL_HOST . "cdn/{version}/data/{lang}/summoner.json";

    public const URL_STATIC_MAPS = self::URL_HOST_STATIC . "maps.json";
    public const URL_STATIC_SEASONS = self::URL_HOST_STATIC . "seasons.json";
    public const URL_STATIC_QUEUES = self::URL_HOST_STATIC . "queues.json";
    public const URL_STATIC_GAME_MODES = self::URL_HOST_STATIC . "gameModes.json";
    public const URL_STATIC_GAME_TYPES = self::URL_HOST_STATIC . "gameTypes.json";
}
