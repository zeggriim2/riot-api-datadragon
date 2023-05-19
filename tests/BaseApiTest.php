<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Tests;

use PHPUnit\Framework\TestCase;
use Zeggriim\RiotApiDatadragon\DataDragonApi;
use Zeggriim\RiotApiDatadragon\Enum\Languages;

class BaseApiTest extends TestCase
{
    protected DataDragonApi $dataDragonApiVerionAndLanguages;

    protected function setUp(): void
    {
        $this->dataDragonApiVerionAndLanguages = new DataDragonApi("13.1.1", Languages::CODE_fr_FR);
    }

    protected function assertGeneral($actuals, $type)
    {
        $this->assertIsArray($actuals);
        foreach ($actuals as $actual) {
            $this->assertInstanceOf($type, $actual);
        }
    }
}