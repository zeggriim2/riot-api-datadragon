<?php

namespace Zeggriim\RiotApiDataDragon\Tests\Traits;

trait AssertLeagueTrait
{
    private function assertLeagueItem(array $dataLeague, array $league): void
    {
        self::assertArrayHasKey('summonerId', $dataLeague);
        self::assertSame($dataLeague['summonerId'], $league['summonerId']);
        self::assertArrayHasKey('leaguePoints', $dataLeague);
        self::assertSame($dataLeague['leaguePoints'], $league['leaguePoints']);
        self::assertArrayHasKey('rank', $dataLeague);
        self::assertSame($dataLeague['rank'], $league['rank']);
        self::assertArrayHasKey('wins', $dataLeague);
        self::assertSame($dataLeague['wins'], $league['wins']);
        self::assertArrayHasKey('losses', $dataLeague);
        self::assertSame($dataLeague['losses'], $league['losses']);
        self::assertArrayHasKey('veteran', $dataLeague);
        self::assertSame($dataLeague['veteran'], $league['veteran']);
        self::assertArrayHasKey('inactive', $dataLeague);
        self::assertSame($dataLeague['inactive'], $league['inactive']);
        self::assertArrayHasKey('freshBlood', $dataLeague);
        self::assertSame($dataLeague['freshBlood'], $league['freshBlood']);
        self::assertArrayHasKey('hotStreak', $dataLeague);
        self::assertSame($dataLeague['hotStreak'], $league['hotStreak']);
    }

    private function assertLeagueEntry(array $dataSend, array $league): void
    {
        self::assertArrayHasKey('leagueId', $dataSend);
        self::assertSame($dataSend['leagueId'], $league['leagueId']);
        self::assertArrayHasKey('leaguePoints', $dataSend);
        self::assertSame($dataSend['leaguePoints'], $league['leaguePoints']);
        self::assertArrayHasKey('tier', $dataSend);
        self::assertSame($dataSend['tier'], $league['tier']);
        self::assertArrayHasKey('rank', $dataSend);
        self::assertSame($dataSend['rank'], $league['rank']);
        self::assertArrayHasKey('summonerId', $dataSend);
        self::assertSame($dataSend['summonerId'], $league['summonerId']);
        self::assertArrayHasKey('leaguePoints', $dataSend);
        self::assertSame($dataSend['leaguePoints'], $league['leaguePoints']);
        self::assertArrayHasKey('wins', $dataSend);
        self::assertSame($dataSend['wins'], $league['wins']);
        self::assertArrayHasKey('losses', $dataSend);
        self::assertSame($dataSend['losses'], $league['losses']);
        self::assertArrayHasKey('veteran', $dataSend);
        self::assertSame($dataSend['veteran'], $league['veteran']);
        self::assertArrayHasKey('inactive', $dataSend);
        self::assertSame($dataSend['inactive'], $league['inactive']);
        self::assertArrayHasKey('freshBlood', $dataSend);
        self::assertSame($dataSend['freshBlood'], $league['freshBlood']);
        self::assertArrayHasKey('hotStreak', $dataSend);
        self::assertSame($dataSend['hotStreak'], $league['hotStreak']);
    }

    public function assertLeagueEntryList(array $dataSend, array $league, int $nbList)
    {

        self::assertArrayHasKey('tier', $dataSend);
        self::assertSame($dataSend['tier'], $league['tier']);
        self::assertArrayHasKey('leagueId', $dataSend);
        self::assertSame($dataSend['leagueId'], $league['leagueId']);
        self::assertArrayHasKey('queue', $dataSend);
        self::assertSame($dataSend['queue'], $league['queue']);
        self::assertArrayHasKey('name', $dataSend);
        self::assertSame($dataSend['name'], $league['name']);
        self::assertArrayHasKey('entries', $dataSend);
        self::assertCount($nbList, $dataSend['entries']);
    }
}