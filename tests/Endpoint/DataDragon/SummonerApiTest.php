<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Endpoint\DataDragon;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zeggriim\RiotApiDataDragon\Endpoint\DataDragon\SummonerApi;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataDragonTrait;

/**
 * @group dragon
 */
class SummonerApiTest extends KernelTestCase
{
    use RiotApiDataDragonTrait;

    public function testSummoner(): void
    {
        $data = [
            'type' => 'summoner',
            'version' => '14.8.1',
            'data' => [
                'SummonerHeal' => [
                    'id' => 'SummonerHeal',
                    'name' => 'Heal',
                    'description' => 'Rend 80-318 PV à votre champion et au champion allié ciblé et augmente de 30% vos vitesses de déplacement pendant 1 sec. Ce soin est divisé par deux sur les unités récemment touchées par le sort d\'invocateur Soins.',
                    'tooltip' => 'Rend <healing>{{ tooltiphealamount }} PV</healing> à votre champion et au champion allié ciblé, en plus d\'augmenter vos <speed>vitesses de déplacement de {{ movespeed*100 }}%</speed> pendant 1 sec.<br /><br /><rules>Si le sort n\'a pas de cible, il sera lancé sur le champion allié le plus mal en point à portée.<br />Ce soin est divisé par deux sur les unités récemment touchées par le sort d\'invocateur Soins.</rules>',
                    'maxrank' => 1,
                    'cooldown' => [240],
                    'cooldownBurn' => '240',
                    'cost' => [0],
                    'costBurn' => '0',
                    'effect' => [null,0.3,0,0,0.5,826,0.5,0,0,0,0],
                    'effectBurn' => [null,'0.3','0', '0', '0.5', '826', '0.5','0','0','0','0','0'],
                    'key' => '7',
                    'summonerLevel'=> 1,
                    'modes' => [],
                    'costType' => 'Pas de coût',
                    'range' => [850],
                    'rangeBurn' => '850',
                    'image' => [
                        'full' => 'SummonerHeal.png',
                        'sprite' => 'spell0.png',
                        'group' => 'spell',
                        'x' => 384,
                        'y' => 0,
                        'w' => 48,
                        'h' => 48,
                    ],
                    'resource' => 'Pas de coût'
                ],
            ],
        ];

        $riotApi = $this->getClientRiotApi($data);
        $summonerApi = new SummonerApi($riotApi);
        $summoners = $summonerApi->getSummoner('14.8.1');

        self::assertArrayHasKey('type', $summoners);
        self::assertSame($data['type'], $summoners['type']);
        self::assertArrayHasKey('version', $summoners);
        self::assertSame($data['version'], $summoners['version']);
        self::assertArrayHasKey('data', $summoners);

        // Item 1
        $summoner = $summoners['data']['SummonerHeal'];
        $dataSummoner = $data['data']['SummonerHeal'];

        self::assertArrayHasKey('id', $summoner);
        self::assertSame($dataSummoner['id'], $summoner['id']);
        self::assertArrayHasKey('name', $summoner);
        self::assertSame($dataSummoner['name'], $summoner['name']);
        self::assertArrayHasKey('description', $summoner);
        self::assertSame($dataSummoner['description'], $summoner['description']);
        self::assertArrayHasKey('tooltip', $summoner);
        self::assertSame($dataSummoner['tooltip'], $summoner['tooltip']);
        self::assertArrayHasKey('maxrank', $summoner);
        self::assertSame($dataSummoner['maxrank'], $summoner['maxrank']);
        self::assertArrayHasKey('cooldown', $summoner);
        self::assertSame($dataSummoner['cooldown'][0], $summoner['cooldown'][0]);
        self::assertArrayHasKey('cooldownBurn', $summoner);
        self::assertSame($dataSummoner['cooldownBurn'], $summoner['cooldownBurn']);
        self::assertArrayHasKey('cost', $summoner);
        self::assertSame($dataSummoner['cost'][0], $summoner['cost'][0]);
        self::assertArrayHasKey('costBurn', $summoner);
        self::assertSame($dataSummoner['costBurn'], $summoner['costBurn']);
    }
}
