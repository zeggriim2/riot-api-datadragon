<?php

namespace Zeggriim\RiotApiDataDragon\Tests\Traits;

use Zeggriim\RiotApiDataDragon\Tests\Traits\Checker\CheckerImageTrait;
use Zeggriim\RiotApiDataDragon\Tests\Traits\Checker\CheckerInfoTrait;
use Zeggriim\RiotApiDataDragon\Tests\Traits\Checker\CheckerPassiveTrait;
use Zeggriim\RiotApiDataDragon\Tests\Traits\Checker\CheckerStatTrait;

trait CheckerChampionTrait
{
    use CheckerStatTrait;
    use CheckerInfoTrait;
    use CheckerImageTrait;
    use CheckerPassiveTrait;

    private function checkChampion(array $dataSend, array $champion,bool $isDetail = false): void
    {
        self::assertArrayHasKey('id', $champion);
        self::assertSame($dataSend['id'], $champion['id']);
        self::assertArrayHasKey('key', $champion);
        self::assertSame($dataSend['key'], $champion['key']);
        self::assertArrayHasKey('name', $champion);
        self::assertSame($dataSend['name'], $champion['name']);
        self::assertArrayHasKey('title', $champion);
        self::assertSame($dataSend['title'], $champion['title']);
        self::assertArrayHasKey('blurb', $champion);
        self::assertSame($dataSend['blurb'], $champion['blurb']);

        self::assertArrayHasKey('info', $champion);
        $this->checkInfo($dataSend['info'], $champion['info']);

        self::assertArrayHasKey('image', $champion);
        $this->checkImage($dataSend['image'], $champion['image']);

        self::assertArrayHasKey('tags', $champion);
        self::assertSame($dataSend['tags'], $champion['tags']);

        self::assertArrayHasKey('partype', $champion);
        self::assertSame($dataSend['partype'], $champion['partype']);

        self::assertArrayHasKey('stats', $champion);
        $this->checkStat($dataSend['stats'], $champion['stats']);

        if ($isDetail) {
            self::assertArrayHasKey('lore', $champion);
            self::assertSame($dataSend['lore'], $champion['lore']);

            self::assertArrayHasKey('allytips', $champion);
            self::assertCount(count($dataSend['allytips']), $champion['allytips']);
            foreach ($champion['allytips'] as $key => $allytip) {
                self::assertSame($dataSend['allytips'][$key], $allytip);
            }

            self::assertArrayHasKey('enemytips', $champion);
            self::assertCount(count($dataSend['enemytips']), $champion['enemytips']);
            foreach ($champion['enemytips'] as $key => $enemytip) {
                self::assertSame($dataSend['enemytips'][$key], $enemytip);
            }

            self::assertArrayHasKey('passive', $champion);
            $this->checkPassive($dataSend['passive'], $champion['passive']);
        }
    }
}
