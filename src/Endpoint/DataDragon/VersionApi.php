<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataDragon;

use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;

class VersionApi implements VersionApiInterface
{
    private const VERSION_URL = '/api/versions.json';

    public function __construct(private readonly RiotApiDataDragonClient $riotApiDataDragon) {}

    public function getVersions(): array
    {
        return $this->riotApiDataDragon->get(self::VERSION_URL)->toArray();
    }
}
