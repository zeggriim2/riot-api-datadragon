<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Exception;

class ServerLimitException extends \Exception
{
    public function __construct(string $message = 'LeagueAPI: Rate limit exceeded request.', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
