<?php

namespace Zeggriim\RiotApiDataDragon\Tests\Traits;

use Zeggriim\RiotApiDataDragon\Dto\Item\Gold;
use Zeggriim\RiotApiDataDragon\Dto\Item\Item;
use Zeggriim\RiotApiDataDragon\Tests\Traits\Checker\AssertImageTrait;

trait AssertItemTrait
{
    use AssertImageTrait;

    private function assertItem(array $dataItem, array $item): void
    {
        self::assertArrayHasKey('name', $item);
        self::assertSame($dataItem['name'], $item['name']);
        self::assertArrayHasKey('description', $item);
        self::assertSame($dataItem['description'], $item['description']);
        self::assertArrayHasKey('colloq', $item);
        self::assertSame($dataItem['colloq'], $item['colloq']);
        self::assertArrayHasKey('plaintext', $item);
        self::assertSame($dataItem['plaintext'], $item['plaintext']);

        self::assertArrayHasKey('image', $item);
        $this->assertImage($dataItem['image'], $item['image']);

        self::assertArrayHasKey('gold', $item);
        $this->assertGold($dataItem['gold'], $item['gold']);

        self::assertArrayHasKey('maps', $item);
        $this->assertMap($dataItem['maps'], $item['maps']);
    }

    public function assertItemObjet(array $dataItem, Item $item): void
    {
        self::assertSame($dataItem['name'], $item->name);
        self::assertSame($dataItem['description'], $item->description);
        self::assertSame($dataItem['colloq'], $item->colloq);
        self::assertSame($dataItem['plaintext'], $item->plaintext);
        $this->assertImageObjet($dataItem['image'], $item->image);
        $this->assertGoldObjet($dataItem['gold'], $item->gold);
        $this->assertMap($dataItem['maps'], $item->maps);

        isset($dataItem['from']) ?
            self::assertSame($dataItem['from'], $item->from) :
            self::assertNull($item->from);

        isset($dataItem['into']) ?
            self::assertSame($dataItem['into'], $item->into) :
            self::assertNull($item->into);

        isset($dataItem['depth']) ?
            self::assertSame($dataItem['depth'], $item->depth) :
            self::assertNull($item->depth);
    }

    private function assertGold(array $dataGold, array $gold): void
    {
        self::assertArrayHasKey('base', $gold);
        self::assertSame($dataGold['base'], $gold['base']);
        self::assertArrayHasKey('purchasable', $gold);
        self::assertSame($dataGold['purchasable'], $gold['purchasable']);
        self::assertArrayHasKey('total', $gold);
        self::assertSame($dataGold['total'], $gold['total']);
        self::assertArrayHasKey('sell', $gold);
        self::assertSame($dataGold['sell'], $gold['sell']);
    }

    private function assertGoldObjet(array $dataGold, Gold $gold): void
    {
        self::assertSame($dataGold['base'], $gold->base);
        self::assertSame($dataGold['purchasable'], $gold->purchasable);
        self::assertSame($dataGold['total'], $gold->total);
        self::assertSame($dataGold['sell'], $gold->sell);
    }

    private function assertMap(array $dataMap, array $map): void
    {
        self::assertArrayHasKey(11, $map);
        self::assertSame($dataMap[11], $map[11]);
        self::assertArrayHasKey(12, $map);
        self::assertSame($dataMap[12], $map[12]);
        self::assertArrayHasKey(21, $map);
        self::assertSame($dataMap[21], $map[21]);
        self::assertArrayHasKey(22, $map);
        self::assertSame($dataMap[22], $map[22]);
        self::assertArrayHasKey(30, $map);
        self::assertSame($dataMap[30], $map[30]);
    }
}
