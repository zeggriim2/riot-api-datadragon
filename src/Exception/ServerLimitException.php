<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Exception;

class ServerLimitException extends \Exception
{
    public function __construct(
        string $message = 'LeagueAPI: Rate limit exceeded request.',
        int $code = 0,
        public readonly ?int $retryAfter = null,
        public readonly ?string $limitType = null,
        ?\Throwable $previous = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function isOtherLimit(): bool
    {
        return null === $this->limitType;
    }
}
