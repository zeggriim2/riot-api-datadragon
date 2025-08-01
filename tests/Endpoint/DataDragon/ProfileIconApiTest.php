<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Endpoint\DataDragon;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataDragonTrait;

/**
 * @group dragon
 */
class ProfileIconApiTest extends KernelTestCase
{
    use RiotApiDataDragonTrait;
    public function testProfileIcon(): void
    {
        $data = [
            'type' => 'profileicon',
            'version' => '14.8.1',
            'data' => [
                [
                    'id' => 0,
                    'image' => [
                        'full' => '0.png',
                        'sprite' => 'profileicon0.png',
                        'group' => 'profileicon',
                        'x' => 0,
                        'y' => 0,
                        'w' => 48,
                        'h' => 48,
                    ]
                ],
                [
                    'id' => 1,
                    'image' => [
                        'full' => '1.png',
                        'sprite' => 'profileicon0.png',
                        'group' => 'profileicon',
                        'x' => 192,
                        'y' => 2880,
                        'w' => 48,
                        'h' => 48,
                    ]
                ]
            ]
        ];

        $profileIconApi = $this->getProfileIconApi($data);
        $profileIcons = $profileIconApi->getProfileIcon('14.8.1');

        self::assertArrayHasKey('type', $profileIcons);
        self::assertSame($data['type'], $profileIcons['type']);
        self::assertArrayHasKey('version', $profileIcons);
        self::assertSame($data['version'], $profileIcons['version']);
        self::assertArrayHasKey('data', $profileIcons);
        self::assertSame($data['data'], $profileIcons['data']);

        // ProfileIcon 1
        $profileIcon = $profileIcons['data'][0];
        $dataProfileIcon = $data['data'][0];

        self::assertArrayHasKey('id', $profileIcon);
        self::assertSame($dataProfileIcon['id'], $profileIcon['id']);
        self::assertArrayHasKey('image', $profileIcon);
        self::assertSame($dataProfileIcon['image'], $profileIcon['image']);
    }
}