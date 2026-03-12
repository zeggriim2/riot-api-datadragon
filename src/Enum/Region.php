<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Enum;

enum Region: string implements RoutingInterface
{
    case AMERICAS = 'americas';
    case ASIA = 'asia';
    case EUROPE = 'europe';
    case SEA = 'sea';

    public function getRoutingKey(): string
    {
        return $this->value;
    }
}
