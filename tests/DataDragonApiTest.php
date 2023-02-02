<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Tests;

class DataDragonApiTest extends BaseApiTest
{
    public function testGetVersionApi()
    {
        $versions = $this->api->getVersions();
        $this->assertIsArray($versions);
        $this->assertNotEmpty($versions);
    }

    public function testGetLanguages()
    {
        $languages = $this->api->getLanguages();
        $this->assertIsArray($languages);
        $this->assertNotEmpty($languages);
    }
}
