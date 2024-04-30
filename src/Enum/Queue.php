<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Enum;

enum Queue: string
{
    case RANKED_SOLO = 'RANKED_SOLO_5x5';
    case RANKED_FLED_SR = 'RANKED_FLED_SR';
    case RANKED_FLED_TT = 'RANKED_FLED_TT';
}