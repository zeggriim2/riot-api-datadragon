<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Traits\Checker;

trait CheckerPassiveTrait
{
    private function checkPassive(array $dataPassive, array $passive): void
    {
        self::assertArrayHasKey('name', $passive);
        self::assertSame($dataPassive['name'], $passive['name']);

        self::assertArrayHasKey('description', $passive);
        self::assertSame($dataPassive['description'], $passive['description']);

        self::assertArrayHasKey('image', $passive);
        $this->checkImage($dataPassive['image'], $passive['image']);
    }
}
