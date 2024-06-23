<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Enum;

enum Queue: string
{
    case RANKED_SOLO = 'RANKED_SOLO_5x5';
    case RANKED_FLEX_SR = 'RANKED_FLEX_SR';
    case RANKED_FLEX_TT = 'RANKED_FLEX_TT';
}