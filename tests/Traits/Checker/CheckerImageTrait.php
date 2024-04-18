<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Traits\Checker;

trait CheckerImageTrait
{
    private function checkImage(array $dataImage, array $image): void
    {
        self::assertArrayHasKey('full', $image);
        self::assertSame($dataImage['full'], $image['full']);
        self::assertArrayHasKey('sprite', $image);
        self::assertSame($dataImage['sprite'], $image['sprite']);
        self::assertArrayHasKey('group', $image);
        self::assertSame($dataImage['group'], $image['group']);
        self::assertArrayHasKey('x', $image);
        self::assertSame($dataImage['x'], $image['x']);
        self::assertArrayHasKey('y', $image);
        self::assertSame($dataImage['y'], $image['y']);
        self::assertArrayHasKey('w', $image);
        self::assertSame($dataImage['w'], $image['w']);
        self::assertArrayHasKey('h', $image);
        self::assertSame($dataImage['h'], $image['h']);
    }
}
