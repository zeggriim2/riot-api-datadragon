<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Tests;

class DataDragonApiTest extends BaseApiTest
{
    public function testGetVersionApi()
    {
        $versions = $this->dataDragonApiVerionAndLanguages->getVersions();
        $this->assertIsArray($versions);
        $this->assertNotEmpty($versions);
    }

    public function testGetLanguages()
    {
        $languages = $this->dataDragonApiVerionAndLanguages->getLanguages();
        $this->assertIsArray($languages);
        $this->assertNotEmpty($languages);
    }
}
