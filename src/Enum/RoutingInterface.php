<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Enum;

interface RoutingInterface
{
    public function getRoutingKey(): string;
}
