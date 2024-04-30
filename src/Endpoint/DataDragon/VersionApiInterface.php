<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

interface VersionApiInterface
{
    public function getVersions(): array;
}
