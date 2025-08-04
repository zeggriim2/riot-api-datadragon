<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Exception;

class DataNotFoundException extends \Exception
{
    public function __construct(string $message = 'LeagueAPI: Data not found', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
