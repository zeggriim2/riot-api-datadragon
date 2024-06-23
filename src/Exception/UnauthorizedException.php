<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Exception;

class UnauthorizedException extends \Exception
{
    protected $message = 'LeagueAPI: Unauthorized request.';
}
