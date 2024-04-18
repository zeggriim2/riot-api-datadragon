<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Endpoint;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zeggriim\RiotApiDataDragon\Endpoint\ChampionApi;
use Zeggriim\RiotApiDataDragon\Tests\Traits\CheckerChampionTrait;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataDragonTrait;

class ChampionApiTest extends KernelTestCase
{
    use RiotApiDataDragonTrait;
    use CheckerChampionTrait;

    public function testGetChampions()
    {
        $data = [
            'type' => 'champion',
            'format'=> 'standAloneComplex',
            'version' => '14.6.1',
            'data' => [
                'Aatrox' => [
                    'version' => '14.6.1',
                    'id' => 'Aatrox',
                    'key' => '266',
                    'name' => 'Aatrox',
                    'title' => 'Épée des Darkin',
                    'blurb' => 'Autrefois, Aatrox et ses…Cependant, après des...',
                    'info' => [
                        'attack'     => 8,
                        'defense'    => 4,
                        'magic'      => 3,
                        'difficulty' => 4,
                    ],
                    'image' => [
                        'full'   => 'Aatrox.png',
                        'sprite' => 'champion0.png',
                        'group'  => 'champion',
                        'x' => 0,
                        'y' => 0,
                        'w' => 48,
                        'h' => 48,
                    ],
                    'tags' => ['tank', 'Fighter'],
                    'partype' => 'Puits de sang',
                    'stats' => [
                        'hp'                    => 650,
                        'hpperlevel'            => 114,
                        'mp'                    => 0,
                        'mpperlevel'            => 0,
                        'movespeed'             => 345,
                        'armor'                 => 38,
                        'armorperlevel'         => 4.45,
                        'spellblock'            => 32,
                        'spellblockperlevel'    => 2.05,
                        'attackrange'           => 175,
                        'hpregen'               => 3,
                        'hpregenperlevel'       => 1,
                        'mpregen'               => 0,
                        'mpregenperlevel'       => 0,
                        'crit'                  => 0,
                        'critperlevel'          => 0,
                        'attackdamage'          => 60,
                        'attackdamageperlevel'  => 5,
                        'attackspeed'           => 0.651,
                        'attackspeedperlevel'   => 2.5,
                    ],
                ],
                'Akshan' => [
                    'version' => '14.6.1',
                    'id' => 'Akshan',
                    'key' => '166',
                    'name' => 'Akshan',
                    'title' => 'Sentinelle rebelle',
                    'blurb' => 'Se jouant du danger, Aks…per au regard de ses...',
                    'info' => [
                        'attack'     => 0,
                        'defense'    => 4,
                        'magic'      => 3,
                        'difficulty' => 4,
                    ],
                    'image' => [
                        'full' => 'Aatrox.png',
                        'sprite' => 'champion0.png',
                        'group' => 'champion',
                        'x' => 144,
                        'y' => 0,
                        'w' => 48,
                        'h' => 48,
                    ],
                    'tags' => ['Marksman', 'Assassin'],
                    'partype' => 'Puits de sang',
                    'stats' => [
                        'hp'                    => 630,
                        'hpperlevel'            => 107,
                        'mp'                    => 350,
                        'mpperlevel'            => 40,
                        'movespeed'             => 330,
                        'armor'                 => 26,
                        'armorperlevel'         => 4.7,
                        'spellblock'            => 30,
                        'spellblockperlevel'    => 1.3,
                        'attackrange'           => 500,
                        'hpregen'               => 3.75,
                        'hpregenperlevel'       => 0.65,
                        'mpregen'               => 8.2,
                        'mpregenperlevel'       => 0.7,
                        'crit'                  => 0,
                        'critperlevel'          => 0,
                        'attackdamage'          => 52,
                        'attackdamageperlevel'  => 3,
                        'attackspeed'           => 0.638,
                        'attackspeedperlevel'   => 4,
                    ],
                ]
            ]
        ];

        $riotApi = $this->getClientRiotApi($data);
        $championApi = new ChampionApi($riotApi);
        $champions = $championApi->getChampions('14.6.1');

        self::assertIsArray($champions);
        self::assertArrayHasKey('type', $champions);
        self::assertSame($data['type'], $champions['type']);
        self::assertArrayHasKey('format', $champions);
        self::assertSame($data['format'], $champions['format']);
        self::assertArrayHasKey('version', $champions);
        self::assertSame($data['version'], $champions['version']);
        self::assertArrayHasKey('data', $champions);
        self::assertCount(count($data['data']), $champions['data']);
        $dataChampions = $champions['data'];
//      Champion 1
        self::assertArrayHasKey('Aatrox', $dataChampions);
        $champion1 = $dataChampions['Aatrox'];
        $this->checkChampion($data['data']['Aatrox'], $champion1);

//      Champion 2
        self::assertArrayHasKey('Akshan', $dataChampions);
        $champion2 = $dataChampions['Akshan'];
        $this->checkChampion($data['data']['Akshan'], $champion2);
    }

    public function testGetChampion()
    {
        $data = [
            'type' => 'champion',
            'format' => 'standAloneComplex',
            'version' => '14.8.1',
            'data' => [
                'Aatrox' => [
                    'id' => 'Aatrox',
                    'key' => '266',
                    'name' => 'Aatrox',
                    'title' => 'Épée des Darkin',
                    'image' => [
                        'full' => 'Aatrox.png',
                        'sprite' => 'champion0.png',
                        'group' => 'champion',
                        'x' => 0,
                        'y' => 0,
                        'w' => 48,
                        'h' => 48,
                    ],
                    'skins' => [
                        [
                            'id' => '266000',
                            'num' => 0,
                            'name' => "default",
                            'chromas' => false,
                        ],
                        [
                            'id' => '266001',
                            'num' => 1,
                            'name' => "Aatrox Justicier",
                            'chromas' => false,
                        ],
                        [
                            'id' => '266002',
                            'num' => 2,
                            'name' => "Mecha Aatrox",
                            'chromas' => true,
                        ],
                        [
                            'id' => '266003',
                            'num' => 3,
                            'name' => "Aatrox chasseur marin",
                            'chromas' => false,
                        ],
                        [
                            'id' => '266007',
                            'num' => 7,
                            'name' => "Aatrox lune de sang",
                            'chromas' => false,
                        ],
                        [
                            'id' => '266008',
                            'num' => 8,
                            'name' => "Aatrox lune de sang prestige",
                            'chromas' => false,
                        ],
                        [
                            'id' => '266009',
                            'num' => 9,
                            'name' => 'Aatrox héros de guerre',
                            'chromas' => true,
                        ],
                        [
                            'id' => '266011',
                            'num' => 11,
                            'name' => 'Aatrox de l\'Odyssée',
                            'chromas' => true,
                        ],
                        [
                            'id' => '266020',
                            'num' => 20,
                            'name' => 'Aatrox lune de sang prestige (2022)',
                            'chromas' => false,
                        ],
                        [
                            'id' => '266021',
                            'num' => 21,
                            'name' => 'Aatrox de l\'éclipse lunaire',
                            'chromas' => true,
                        ],
                        [
                            'id' => '266030',
                            'num' => 30,
                            'name' => 'DRX Aatrox',
                            'chromas' => true,
                        ],
                        [
                            'id' => '266031',
                            'num' => 31,
                            'name' => 'DRX Aatrox prestige',
                            'chromas' => false,
                        ],
                    ],
                    'lore' => 'Autrefois, Aatrox et ses…engeance apocalyptique.',
                    'blurb' => 'Autrefois, Aatrox et ses frères étaient honorés pour avoir défendu Shurima contre le Néant. Mais ils finirent par devenir une menace plus grande encore pour Runeterra : la ruse et la sorcellerie furent employées pour les battre. Cependant, après des...',
                    'allytips' => [
                        'Utilisez Ruée obscure tout en lançant Épée des Darkin pour augmenter vos chances de toucher l\'ennemi.',
                        'Facilitez Épée des Darkin avec des compétences de contrôle de foule, telles que Chaînes infernales, ou avec les effets immobilisants de vos alliés.',
                        'Lancez Fossoyeur des mondes quand vous êtes certain de pouvoir forcer le combat.'
                    ],
                    'enemytips' => [
                        'Les attaques d\'Aatrox sont prévisibles. Profitez-en pour esquiver ses zones d\'impact.',
                        'Il est plus facile de fuir les Chaînes infernales d\'Aatrox en courant vers un côté ou vers Aatrox.',
                        'Quand Aatrox utilise son ultime, gardez vos distances pour l\'empêcher de revenir à la vie.'
                    ],
                    'tags' => ['Fighter', 'Tank', 'Puits de sang'],
                    'partype' => 'Puits de sang',
                    'info' => [
                        'attack' => 8,
                        'defense'=> 4,
                        'magic' =>  3,
                        'difficulty' =>  4,
                    ],
                    'stats' => [
                        'hp' => 650,
                        'hpperlevel' => 114,
                        'mp' => 0,
                        'mpperlevel' => 0,
                        'movespeed' => 345,
                        'armor' => 38,
                        'armorperlevel' => 4.45,
                        'spellblock' => 32,
                        'spellblockperlevel' => 2.05,
                        'attackrange' => 175,
                        'hpregen' => 2,
                        'hpregenperlevel' => 1,
                        'mpregen' => 0,
                        'mpregenperlevel' => 0,
                        'crit' => 0,
                        'critperlevel' => 0,
                        'attackdamage' => 60,
                        'attackdamageperlevel' => 5,
                        'attackspeedperlevel' => 2.5,
                        'attackspeed' => 0.651
                    ],
                    'spells' => [

                    ],
                    'passive' => [
                        'name' => 'Posture du massacreur',
                        'description' => 'Régulièrement, la prochaine attaque de base d\'Aatrox inflige des <physicalDamage>dégâts physiques</physicalDamage> supplémentaires et le soigne, selon un pourcentage des PV max de la cible. ',
                        'image' => [
                            'full' => 'Aatrox_Passive.png',
                            'sprite' => 'passive0.png',
                            'group' => 'passive',
                            'x' => 0,
                            'y' => 0,
                            'w' => 48,
                            'h' => 48,
                        ]
                    ]
                ]
            ]
        ];

        $riotApi = $this->getClientRiotApi($data);
        $championApi = new ChampionApi($riotApi);
        $champion = $championApi->getChampion('aatrox', '14.8.1');

        self::assertIsArray($champion);
        self::assertArrayHasKey('type', $champion);
        self::assertSame($data['type'], $champion['type']);
        self::assertArrayHasKey('format', $champion);
        self::assertSame($data['format'], $champion['format']);
        self::assertArrayHasKey('version', $champion);
        self::assertSame($data['version'], $champion['version']);
        self::assertArrayHasKey('data', $champion);
        self::assertCount(count($data['data']), $champion['data']);
        $dataChampion = $champion['data'];

        // Champion
        self::assertArrayHasKey('Aatrox', $dataChampion);
        $this->checkChampion($data['data']['Aatrox'], $dataChampion['Aatrox'], true);
    }
}
