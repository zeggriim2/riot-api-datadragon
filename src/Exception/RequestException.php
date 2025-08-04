<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Exception;

class RequestException extends \Exception
{
    public function __construct(string $message = 'LeagueAPI: Request is invalid', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
