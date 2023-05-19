<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Tests\DataDragonApi;

use Zeggriim\RiotApiDatadragon\DataDragonApi;
use Zeggriim\RiotApiDatadragon\Exception\EmptyArgument;
use Zeggriim\RiotApiDatadragon\Model\Item\Gold;
use Zeggriim\RiotApiDatadragon\Model\Item\Item;
use Zeggriim\RiotApiDatadragon\Tests\BaseApiTest;
use Zeggriim\RiotApiDatadragon\Tests\Traits\AssertGeneralTrait;
use Zeggriim\RiotApiDatadragon\Tests\Traits\AssertImageTrait;

class ItemApiTest extends BaseApiTest
{
    use AssertImageTrait;
    use AssertGeneralTrait;

    public function testGetItemsNullVersion()
    {
        $api = new DataDragonApi(lang: 'fr_FR');
        $this->expectException(EmptyArgument::class);
        $api->getItems();
    }

    public function testGetItemsNullLang()
    {
        $api = new DataDragonApi(version: '13.1.1');
        $this->expectException(EmptyArgument::class);
        $api->getItems();
    }

    public function testGetItems()
    {
        $items = $this->dataDragonApiVerionAndLanguages->getItems();
        $this->assertGeneral($items, Item::class);
        $first_keys = (string)array_key_first($items);
        foreach ($items as $item) {
            $this->assertItem($item);
        }
    }

    private function assertItem(Item $item)
    {
        $this->assertIsString($item->getName());
        $this->assertIsString($item->getDescription());
        $this->assertIsString($item->getColloq());
        $this->assertIsString($item->getPlaintext());
        $this->assertNullOrIsArray($item->getInto());
        $this->assertImage($item->getImage());
        $this->assertGold($item->getGold());
        $this->assertIsArray($item->getTags());
        $this->assertIsArray($item->getMaps());
        $this->assertIsArray($item->getStats());
        $this->assertNullOrIsArray($item->getEffect());
    }

    private function assertGold(Gold $gold)
    {
        $this->assertIsInt($gold->getBase());
        $this->assertIsBool($gold->isPurchasable());
        $this->assertIsInt($gold->getTotal());
        $this->assertIsInt($gold->getSell());
    }

}
