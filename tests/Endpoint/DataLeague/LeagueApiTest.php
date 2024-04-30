<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Endpoint\DataLeague;


use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zeggriim\RiotApiDataDragon\Enum\Division;
use Zeggriim\RiotApiDataDragon\Enum\Queue;
use Zeggriim\RiotApiDataDragon\Enum\Tier;
use Zeggriim\RiotApiDataDragon\Tests\Traits\AssertLeagueTrait;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataLeagueTrait;

/**
 * @group league
 */
class LeagueApiTest extends KernelTestCase
{
    use AssertLeagueTrait;
    use RiotApiDataLeagueTrait;

    /**
     * @dataProvider providerLeague
     */
    public function testGetBigLeague(array $dataResponse,string $method): void
    {
        $leagueApi = $this->getLeagueApi($dataResponse);

        self::assertTrue(method_exists($leagueApi, $method));

        $leagues = $leagueApi->$method();

        self::assertIsArray($leagues);
        $this->assertLeagueEntryList($leagues, $dataResponse, 2);

        $firstLeague = $leagues['entries'][0];
        $this->assertLeagueItem($firstLeague, $dataResponse['entries'][0]);

        $secondLeague = $leagues['entries'][1];
        $this->assertLeagueItem($secondLeague, $dataResponse['entries'][1]);
    }

    public static function providerLeague(): array
    {
        $dataResponse = [
            'tier' => 'CHALLENGER',
            'leagueId' => 'f1-22ee-3814-a360-b5a7f45',
            'queue' => 'RANKED_SOLO_5x5',
            'name' => 'Nami \'s Alliance',
            'entries' => [
                [
                    'summonerId'=> 'hEVfJbhPOagFBgHHDvOTaCigErxIKw3lKjz9YChqMAZ8lQc',
                    'leaguePoints'=> 892,
                    'rank'=> 'I',
                    'wins'=> 310,
                    'losses'=> 254,
                    'veteran'=> false,
                    'inactive'=> false,
                    'freshBlood'=> true,
                    'hotStreak'=> true
                ],
                [
                    'summonerId' => 'tKfbJzZOJ0NVzTiPDFZw7e-5YvoKf7vyNXfb4wxRds4VX0-',
                    'leaguePoints' => 960,
                    'rank' => 'I',
                    'wins' => 189,
                    'losses' => 140,
                    'veteran' => false,
                    'inactive' => false,
                    'freshBlood' => false,
                    'hotStreak' => false
                ]
            ]
        ];

        return [
            'Challenger' => [
                'dataResponse' => $dataResponse,
                'method' => 'getChallenger'
            ],
            'Grand Master' => [
                'dataResponse' => $dataResponse,
                'method' => 'getGrandMaster'
            ],
            'Master' => [
                'dataResponse' => $dataResponse,
                'method' => 'getMaster'
            ],
        ];
    }

    public function testGetAllWithDivisionTierQueue()
    {
        $dataResponse = [
            [
                "leagueId"=> "3437378e-b857-4b1e-b554-4598f31dd36a",
                "queueType"=> "RANKED_FLEX_SR",
                "tier"=> "GOLD",
                "rank"=> "I",
                "summonerId"=> "T1e3zoiqAc5gNv88a6EhUktK3InEtscj6rXKjUyhApQCFwJ0",
                "leaguePoints"=> 82,
                "wins"=> 9,
                "losses"=> 5,
                "veteran"=> false,
                "inactive"=> false,
                "freshBlood"=> false,
                "hotStreak"=> false
            ],
            [
                "leagueId"=> "80c6f19e-56d4-4da6-ad25-0338314e5fa7",
                "queueType"=> "RANKED_FLEX_SR",
                "tier"=> "GOLD",
                "rank"=> "I",
                "summonerId"=> "jSjP7GyZY4j9STVYwxnNvKO7VGNZL27oDiT79K9TSRGsnDDn",
                "leaguePoints"=> 50,
                "wins"=> 2,
                "losses"=> 8,
                "veteran"=> false,
                "inactive"=> false,
                "freshBlood"=> false,
                "hotStreak"=> false
            ],
        ];

        $leagueApi = $this->getLeagueApi($dataResponse);
        $leagues = $leagueApi->getAll(Queue::RANKED_FLED_SR, Tier::GOLD, Division::I);

        $firstLeague = $leagues[0];
        $this->assertLeagueEntry($firstLeague, $dataResponse[0]);

        $secondLeague = $leagues[1];
        $this->assertLeagueEntry($secondLeague, $dataResponse[1]);
    }

    public function testGetLeagueWithId()
    {
        $dataResponse = [
            "tier"=> "GOLD",
            "leagueId"=> "3437378e-b857-4b1e-b554-4598f31dd36a",
            "queue"=> "RANKED_FLEX_SR",
            "name"=> "Dr. Mundo's Inquisitors",
            "entries"=> [
                [
                    "summonerId"=> "YIhWs5RLvg0K1TvICE0Z0lRq9qYe0vEqJ5NYD7It72q_Ddc",
                    "leaguePoints"=> 0,
                    "rank"=> "IV",
                    "wins"=> 51,
                    "losses"=> 40,
                    "veteran"=> false,
                    "inactive"=> false,
                    "freshBlood"=> false,
                    "hotStreak"=> false
                ],
                [
                    "summonerId"=> "GM87Q1cVqHNsqgXBEFp0nul27BP1UJBknFYTpBp6wsODeqI",
                    "leaguePoints"=> 36,
                    "rank"=> "IV",
                    "wins"=> 15,
                    "losses"=> 8,
                    "veteran"=> false,
                    "inactive"=> false,
                    "freshBlood"=> false,
                    "hotStreak"=> false
                ],
                [
                    "summonerId"=> "9c5xsKUES_hOp1dVnyJ216Sjr3Syukou11xgjFoDEjatpNE",
                    "leaguePoints"=> 41,
                    "rank"=> "IV",
                    "wins"=> 19,
                    "losses"=> 16,
                    "veteran"=> false,
                    "inactive"=> false,
                    "freshBlood"=> false,
                    "hotStreak"=> false
                ]
            ]
        ];

        $leagueApi = $this->getLeagueApi($dataResponse);
        $leagues = $leagueApi->getLeagueWithId('3437378e-b857-4b1e-b554-4598f31dd36a');

        $this->assertLeagueEntryList($leagues, $dataResponse, 3);

        $firstLeague = $leagues['entries'][0];

        $this->assertLeagueItem($firstLeague, $dataResponse['entries'][0]);
        $secondLeague = $leagues['entries'][1];
        $this->assertLeagueItem($secondLeague, $dataResponse['entries'][1]);
        $thirdLeague = $leagues['entries'][2];
        $this->assertLeagueItem($thirdLeague, $dataResponse['entries'][2]);
    }

    public function testGetLeagueWithSummonerId()
    {
        $dataResponse = [
            [
                "leagueId"      => "3437378e-b857-4b1e-b554-4598f31dd36a",
                "queueType"     => "RANKED_FLEX_SR",
                "tier"          => "GOLD",
                "rank"          => "IV",
                "summonerId"    => "YIhWs5RLvg0K1TvICE0Z0lRq9qYe0vEqJ5NYD7It72q_Ddc",
                "leaguePoints"  => 0,
                "wins"          => 51,
                "losses"        => 40,
                "veteran"       => false,
                "inactive"      => false,
                "freshBlood"    => false,
                "hotStreak"     => false
            ],
            [
                "leagueId"      => "b9872597-386f-4db4-b79a-fa952cb3471f",
                "queueType"     => "RANKED_SOLO_5x5",
                "tier"          => "BRONZE",
                "rank"          => "II",
                "summonerId"    => "YIhWs5RLvg0K1TvICE0Z0lRq9qYe0vEqJ5NYD7It72q_Ddc",
                "leaguePoints"  => 45,
                "wins"          => 76,
                "losses"        => 89,
                "veteran"       => false,
                "inactive"      => false,
                "freshBlood"    => false,
                "hotStreak"     => false
            ]
        ];

        $leagueApi = $this->getLeagueApi($dataResponse);
        $leagues = $leagueApi->getLeagueInAllQueuesWithSummonerId('YIhWs5RLvg0K1TvICE0Z0lRq9qYe0vEqJ5NYD7It72q_Ddc');

        $firstLeague = $leagues[0];
        $this->assertLeagueEntry($firstLeague, $dataResponse[0]);
        $secondLeague = $leagues[1];
        $this->assertLeagueEntry($secondLeague, $dataResponse[1]);
    }

    public function testGetBadRequest()
    {
        $leagueApi = $this->getLeagueApi(['test'=> 'test'], ['http_code' => 400]);
        $res = $leagueApi->getGrandMaster();
        self::assertCount(0, $res);
    }
}
