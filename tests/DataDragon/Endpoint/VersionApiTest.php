<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\DataDragon\Endpoint;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataDragonTrait;

/**
 * @group dragon
 *
 * @internal
 *
 * @coversDefaultClass \Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\VersionApi
 */
final class VersionApiTest extends KernelTestCase
{
    use RiotApiDataDragonTrait;

    public function testGetVersions(): void
    {
        $data = ['16.6.1', '16.5.1', '16.4.2', '16.4.1'];

        $versionApi = $this->getVersionApi($data);

        $versions = $versionApi->getVersions();

        self::assertNotEmpty($versions);
        self::assertCount(\count($data), $versions);
        self::assertSame($data[0], $versions[0]);
        self::assertSame($data[1], $versions[1]);
        self::assertSame($data[2], $versions[2]);
        self::assertSame($data[3], $versions[3]);
    }
}
