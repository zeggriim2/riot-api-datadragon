<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Exception;

class RequestException extends \Exception
{
    protected $message = 'LeagueAPI: Request is invalid';
}
