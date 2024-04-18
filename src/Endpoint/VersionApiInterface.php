<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint;

interface VersionApiInterface
{
    public function getVersions(): array;
}
