<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Exception;

class UnauthorizedException extends \Exception
{
    public function __construct(string $message = 'LeagueAPI: Unauthorized request.', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
