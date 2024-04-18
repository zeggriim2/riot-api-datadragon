<?php

namespace Zeggriim\RiotApiDataDragon\Enum;

enum Region: string
{
    case AMERICAS   = 'americas.api.riotgames.com';
    case ASIA       = 'asia.api.riotgames.com';
    case EUROPE     = 'europe.api.riotgames.com';
    case SEA        = 'sea.api.riotgames.com';
}
