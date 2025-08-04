<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Traits\Checker;

use Zeggriim\RiotApiDataDragon\Dto\Champion\ChampionPassive;

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

    public function assertPassiveObjet(array $dataPassive, ChampionPassive $passive): void
    {
        self::assertSame($dataPassive['name'], $passive->name);

        self::assertSame($dataPassive['description'], $passive->description);

        $this->assertImageObjet($dataPassive['image'], $passive->image);
    }
}
