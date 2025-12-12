<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Endpoint;

interface VersionApiInterface
{
    public function getVersions(): array;
}
