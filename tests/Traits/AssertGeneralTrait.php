<?php

namespace Zeggriim\RiotApiDatadragon\Tests\Traits;

trait AssertGeneralTrait
{
    public function assertNullOrIsInt(?int $actual)
    {
        if (is_int($actual)) {
            $this->assertIsInt($actual);
        } else {
            $this->assertNull($actual);
        }
    }


    public function assertNullOrIsString(?string $actual)
    {
        if (is_string($actual)) {
            $this->assertIsString($actual);
        } else {
            $this->assertNull($actual);
        }
    }

    public function assertNullOrIsArray(?array $actual)
    {
        if (is_array($actual)) {
            $this->assertIsArray($actual);
        } else {
            $this->assertNull($actual);
        }
    }

    public function assertNullOrIsBool(?bool $actual)
    {
        if (is_bool($actual)) {
            $this->assertIsBool($actual);
        } else {
            $this->assertNull($actual);
        }
    }
}
