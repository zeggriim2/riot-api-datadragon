<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Enum;

/**
 * Queue IDs for League of Legends matches.
 *
 * @see https://static.developer.riotgames.com/docs/lol/queues.json
 */
enum QueueId: int
{
    // Classic
    case CUSTOM = 0;

    // Summoner's Rift
    case NORMAL_BLIND_PICK = 430;
    case NORMAL_DRAFT_PICK = 400;
    case RANKED_SOLO_DUO = 420;
    case RANKED_FLEX = 440;
    case CLASH = 700;

    // ARAM
    case ARAM = 450;

    // Special Modes
    case URF = 900;
    case ARURF = 1010;
    case ONE_FOR_ALL = 1020;
    case ULTIMATE_SPELLBOOK = 1400;
    case ARENA = 1700;

    // Bot Games
    case CO_OP_VS_AI_INTRO = 830;
    case CO_OP_VS_AI_BEGINNER = 840;
    case CO_OP_VS_AI_INTERMEDIATE = 850;

    // Quick Play
    case QUICK_PLAY = 490;
}
