<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint;

use Zeggriim\RiotApiDataDragon\RiotApiDataDragon;

class VersionApi implements VersionApiInterface
{
    private const VERSION_URL = '/api/versions.json';

    public function __construct(private readonly RiotApiDataDragon $riotApiDataDragon) {}

    public function getVersions(): array
    {
        return $this->riotApiDataDragon->get(self::VERSION_URL);
    }
}
