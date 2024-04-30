<?php
declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Endpoint\DataDragon;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\ItemApi;
use Zeggriim\RiotApiDataDragon\Tests\Traits\AssertItemTrait;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataDragonTrait;

/**
 * @group dragon
 */
class ItemApiTest extends KernelTestCase
{
    use RiotApiDataDragonTrait;
    use AssertItemTrait;

    public function testGetItems()
    {
        $data = [
            'type' => 'item',
            'version' =>  '14.8.1',
            'data' => [
                '1028' => [
                    'name' => 'Cristal de rubis',
                    'description' => '<mainText><stats><attention>+150</attention> PV</stats><br><br></mainText>',
                    'colloq' => ';red;ruby crystal;rouge;cristal de rubis',
                    'plaintext' => 'Augmente les PV.',
                    'into' => ['3742','1011', '3071', '2021', '6662'],
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
                        'sell' => 280
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
                    'from' => ['1028',],
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
                        'sell' => 630
                    ],
                    'tags' => ['Health'],
                    'maps' => [11 => true, 12 => true, 21 => true, 22 => false, 30 => false],
                    'stats' => ['FlatHPPoolMod' => 350],
                    'depth' => 2
                ],
            ],
            'tree' => [
                [
                    'header' => 'START',
                    'tags' => ['LANE', 'JUNGLE']
                ],
                [
                    'header' => 'MAGIC',
                    'tags' => ['MANA', 'SPELLDAMAGE', 'COOLDOWNREDUCTION', 'MANAREGEN']
                ]
            ]
        ];

        $riotApi = $this->getClientRiotApi($data);
        $itemApi = new ItemApi($riotApi);

        $items = $itemApi->getItems('14.8.1');

        self::assertIsArray($items);

        self::assertArrayHasKey('type', $items);
        self::assertSame($data['type'], $items['type']);
        self::assertArrayHasKey('version', $items);
        self::assertSame($data['version'], $items['version']);
        self::assertArrayHasKey('data', $items);
        self::assertSame($data['data'], $items['data']);
        self::assertArrayHasKey('tree', $items);
        self::assertSame($data['tree'], $items['tree']);

        $dataItems = $items['data'];
        self::assertIsArray($dataItems);

        // Item 1
        self::assertArrayHasKey('1028', $dataItems);
        $champion1 = $dataItems['1028'];
        $this->assertItem($data['data']['1028'], $champion1);
    }
}
