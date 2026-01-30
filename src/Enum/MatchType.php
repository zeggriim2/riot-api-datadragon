<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Enum;

enum MatchType: string
{
    case RANKED = 'ranked';
    case NORMAL = 'normal';
    case TOURNEY = 'tourney';
    case TUTORIAL = 'tutorial';
}
