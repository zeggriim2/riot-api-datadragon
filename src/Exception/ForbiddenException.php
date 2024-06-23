<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Exception;

class ForbiddenException extends \Exception
{
    protected $message = 'LeagueAPI: Forbidden.';
}
