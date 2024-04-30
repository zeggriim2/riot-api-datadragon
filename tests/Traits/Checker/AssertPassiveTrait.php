<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Traits\Checker;

trait AssertPassiveTrait
{
    private function assertPassive(array $dataPassive, array $passive): void
    {
        self::assertArrayHasKey('name', $passive);
        self::assertSame($dataPassive['name'], $passive['name']);

        self::assertArrayHasKey('description', $passive);
        self::assertSame($dataPassive['description'], $passive['description']);

        self::assertArrayHasKey('image', $passive);
        $this->assertImage($dataPassive['image'], $passive['image']);
    }
}
