<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Endpoint\DataDragon;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zeggriim\RiotApiDataDragon\Dto\Item\ItemCollection;
use Zeggriim\RiotApiDataDragon\Tests\Traits\AssertItemTrait;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataDragonTrait;

/**
 * @group dragon
 *
 * @internal
 *
 * @coversDefaultClass \Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ItemApi
 */
final class ItemApiTest extends KernelTestCase
{
    use AssertItemTrait;
    use RiotApiDataDragonTrait;

    public function testGetItems(): void
    {
        $data = [
            'type' => 'item',
            'version' => '14.8.1',
            'data' => [
                '1028' => [
                    'name' => 'Cristal de rubis',
                    'description' => '<mainText><stats><attention>+150</attention> PV</stats><br><br></mainText>',
                    'colloq' => ';red;ruby crystal;rouge;cristal de rubis',
                    'plaintext' => 'Augmente les PV.',
                    'into' => ['3742', '1011', '3071', '2021', '6662'],
                    'image' => [
                        'full' => '1028.png',
                        'sprite' => 'item0.png',
                        'group' => 'item',
                        'x' => 336,
                        'y' => 0,
                        'w' => 48,
                        'h' => 48,
                    ],
                    'gold' => [
                        'base' => 400,
                        'purchasable' => true,
                        'total' => 400,
                        'sell' => 280,
                    ],
                    'tags' => ['Health'],
                    'maps' => [11 => true, 12 => true, 21 => true, 22 => false, 30 => false],
                    'stats' => ['FlatHPPoolMod' => 150],
                ],
                '1011' => [
                    'name' => 'Ceinture du géant',
                    'description' => '<mainText><stats><attention>+350</attention> PV</stats><br><br></mainText>',
                    'colloq' => ';Giant\'s Belt;ceinture du géant',
                    'plaintext' => 'Augmente grandement les PV.',
                    'from' => ['1028'],
                    'into' => ['40637', '3084', '8001', '3075'],
                    'image' => [
                        'full' => '1011.png',
                        'sprite' => 'item0.png',
                        'group' => 'item',
                        'x' => 144,
                        'y' => 0,
                        'w' => 48,
                        'h' => 48,
                    ],
                    'gold' => [
                        'base' => 500,
                        'purchasable' => true,
                        'total' => 900,
                        'sell' => 630,
                    ],
                    'tags' => ['Health'],
                    'maps' => [11 => true, 12 => true, 21 => true, 22 => false, 30 => false],
                    'stats' => ['FlatHPPoolMod' => 350],
                    'depth' => 2,
                ],
            ],
            'tree' => [
                [
                    'header' => 'START',
                    'tags' => ['LANE', 'JUNGLE'],
                ],
                [
                    'header' => 'MAGIC',
                    'tags' => ['MANA', 'SPELLDAMAGE', 'COOLDOWNREDUCTION', 'MANAREGEN'],
                ],
            ],
        ];

        $itemApi = $this->getItemApi($data);

        $items = $itemApi->getItems('14.8.1');

        self::assertNotEmpty($items);

        self::assertArrayHasKey('type', $items);
        self::assertSame($data['type'], $items['type']);
        self::assertArrayHasKey('version', $items);
        self::assertSame($data['version'], $items['version']);
        self::assertArrayHasKey('data', $items);
        self::assertSame($data['data'], $items['data']);
        self::assertArrayHasKey('tree', $items);
        self::assertSame($data['tree'], $items['tree']);

        $dataItems = $items['data'];

        // Item 1
        self::assertArrayHasKey('1028', $dataItems);
        $item1 = $dataItems['1028'];
        $this->assertItem($data['data']['1028'], $item1);
    }

    public function testGetItemsAsCollection(): void
    {
        $data = [
            'type' => 'item',
            'version' => '14.8.1',
            'basic' => [
                'name' => '',
                'rune' => ['isrune' => false, 'tier' => 1, 'type' => 'red'],
                'gold' => ['base' => 0, 'total' => 0, 'sell' => 0],
                'group' => '',
                'description' => '',
                'colloq' => ';',
            ],
            'data' => [
                '1028' => [
                    'name' => 'Cristal de rubis',
                    'description' => '<mainText><stats><attention>+150</attention> PV</stats><br><br></mainText>',
                    'colloq' => ';red;ruby crystal;rouge;cristal de rubis',
                    'plaintext' => 'Augmente les PV.',
                    'into' => ['3742', '1011', '3071', '2021', '6662'],
                    'image' => [
                        'full' => '1028.png',
                        'sprite' => 'item0.png',
                        'group' => 'item',
                        'x' => 336,
                        'y' => 0,
                        'w' => 48,
                        'h' => 48,
                    ],
                    'gold' => [
                        'base' => 400,
                        'purchasable' => true,
                        'total' => 400,
                        'sell' => 280,
                    ],
                    'tags' => ['Health'],
                    'maps' => [11 => true, 12 => true, 21 => true, 22 => false, 30 => false],
                    'stats' => ['FlatHPPoolMod' => 150],
                ],
                '1011' => [
                    'name' => 'Ceinture du géant',
                    'description' => '<mainText><stats><attention>+350</attention> PV</stats><br><br></mainText>',
                    'colloq' => ';Giant\'s Belt;ceinture du géant',
                    'plaintext' => 'Augmente grandement les PV.',
                    'from' => ['1028'],
                    'into' => ['40637', '3084', '8001', '3075'],
                    'image' => [
                        'full' => '1011.png',
                        'sprite' => 'item0.png',
                        'group' => 'item',
                        'x' => 144,
                        'y' => 0,
                        'w' => 48,
                        'h' => 48,
                    ],
                    'gold' => [
                        'base' => 500,
                        'purchasable' => true,
                        'total' => 900,
                        'sell' => 630,
                    ],
                    'tags' => ['Health'],
                    'maps' => [11 => true, 12 => true, 21 => true, 22 => false, 30 => false],
                    'stats' => ['FlatHPPoolMod' => 350],
                    'depth' => 2,
                ],
                '2021' => [
                    'name' => 'Foreuse',
                    'description' => '<mainText><stats><attention>+15</attention> dégâts d\'attaque<br><attention>+250</attention> PV</stats><br><br></mainText>',
                    'colloq' => '',
                    'plaintext' => '',
                    'from' => ['1036', '1028'],
                    'into' => ['2501', '3053', '3073', '3814', '3181', '3161', '3748', '6610'],
                    'image' => [
                        'full' => '2021.png',
                        'sprite' => 'item0.png',
                        'group' => 'item',
                        'x' => 96,
                        'y' => 288,
                        'w' => 48,
                        'h' => 48,
                    ],
                    'gold' => ['base' => 400, 'purchasable' => true, 'total' => 1150, 'sell' => 805],
                    'tags' => ['Health', 'Damage'],
                    'maps' => [11 => true, 12 => true, 21 => true, 22 => false, 30 => false, 33 => false, 35 => true],
                    'stats' => ['FlatHPPoolMod' => 250, 'FlatPhysicalDamageMod' => 15],
                    'depth' => 2,
                ],
            ],
            'groups' => [
                ['id' => 'HuntersTalismanGroup', 'MaxGroupOwnable' => '1'],
                ['id' => 'HuntersMacheteGroup', 'MaxGroupOwnable' => '1'],
                ['id' => 'AHCapstone', 'MaxGroupOwnable' => '1'],
                ['id' => 'APMultiplier', 'MaxGroupOwnable' => '1'],
                ['id' => 'ArenaAllItemLockOutGroup', 'MaxGroupOwnable' => '99'],
            ],
            'tree' => [
                [
                    'header' => 'START',
                    'tags' => ['LANE', 'JUNGLE'],
                ],
                [
                    'header' => 'MAGIC',
                    'tags' => ['MANA', 'SPELLDAMAGE', 'COOLDOWNREDUCTION', 'MANAREGEN'],
                ],
            ],
        ];

        $championApi = $this->getItemApi($data);
        $itemColletion = $championApi->getItemsAsCollection('14.8.1');

        // Test de la Collection
        self::assertInstanceOf(ItemCollection::class, $itemColletion);
        self::assertSame(\count($data['data']), $itemColletion->count());

        self::assertSame($data['version'], $itemColletion->version);
        self::assertSame($data['groups'], $itemColletion->groups);
        self::assertSame($data['tree'], $itemColletion->tree);

        // Item 1
        self::assertArrayHasKey('1028', $itemColletion->items);
        $item1 = $itemColletion->items['1028'];
        $this->assertItemObjet($data['data']['1028'], $item1);

        // Item 2
        self::assertArrayHasKey('2021', $itemColletion->items);
        $item2 = $itemColletion->items['2021'];
        $this->assertItemObjet($data['data']['2021'], $item2);
    }
}
