<?php

namespace Zeggriim\RiotApiDataDragon\Tests\Traits;

trait AssertLeagueTrait
{
    private function assertLeagueItem(array $dataLeague, array $dataResponse): void
    {
        self::assertArrayHasKey('summonerId', $dataLeague);
        self::assertSame($dataLeague['summonerId'], $dataResponse['summonerId']);
        self::assertArrayHasKey('leaguePoints', $dataLeague);
        self::assertSame($dataLeague['leaguePoints'], $dataResponse['leaguePoints']);
        self::assertArrayHasKey('rank', $dataLeague);
        self::assertSame($dataLeague['rank'], $dataResponse['rank']);
        self::assertArrayHasKey('wins', $dataLeague);
        self::assertSame($dataLeague['wins'], $dataResponse['wins']);
        self::assertArrayHasKey('losses', $dataLeague);
        self::assertSame($dataLeague['losses'], $dataResponse['losses']);
        self::assertArrayHasKey('veteran', $dataLeague);
        self::assertSame($dataLeague['veteran'], $dataResponse['veteran']);
        self::assertArrayHasKey('inactive', $dataLeague);
        self::assertSame($dataLeague['inactive'], $dataResponse['inactive']);
        self::assertArrayHasKey('freshBlood', $dataLeague);
        self::assertSame($dataLeague['freshBlood'], $dataResponse['freshBlood']);
        self::assertArrayHasKey('hotStreak', $dataLeague);
        self::assertSame($dataLeague['hotStreak'], $dataResponse['hotStreak']);
    }

    private function assertLeagueEntry(array $dataLeague, array $dataResponse): void
    {
        self::assertArrayHasKey('leagueId', $dataLeague);
        self::assertSame($dataLeague['leagueId'], $dataResponse['leagueId']);
        self::assertArrayHasKey('leaguePoints', $dataLeague);
        self::assertSame($dataLeague['leaguePoints'], $dataResponse['leaguePoints']);
        self::assertArrayHasKey('tier', $dataLeague);
        self::assertSame($dataLeague['tier'], $dataResponse['tier']);
        self::assertArrayHasKey('rank', $dataLeague);
        self::assertSame($dataLeague['rank'], $dataResponse['rank']);
        self::assertArrayHasKey('summonerId', $dataLeague);
        self::assertSame($dataLeague['summonerId'], $dataResponse['summonerId']);
        self::assertArrayHasKey('leaguePoints', $dataLeague);
        self::assertSame($dataLeague['leaguePoints'], $dataResponse['leaguePoints']);
        self::assertArrayHasKey('wins', $dataLeague);
        self::assertSame($dataLeague['wins'], $dataResponse['wins']);
        self::assertArrayHasKey('losses', $dataLeague);
        self::assertSame($dataLeague['losses'], $dataResponse['losses']);
        self::assertArrayHasKey('veteran', $dataLeague);
        self::assertSame($dataLeague['veteran'], $dataResponse['veteran']);
        self::assertArrayHasKey('inactive', $dataLeague);
        self::assertSame($dataLeague['inactive'], $dataResponse['inactive']);
        self::assertArrayHasKey('freshBlood', $dataLeague);
        self::assertSame($dataLeague['freshBlood'], $dataResponse['freshBlood']);
        self::assertArrayHasKey('hotStreak', $dataLeague);
        self::assertSame($dataLeague['hotStreak'], $dataResponse['hotStreak']);
    }

    public function assertLeagueEntryList(array $dataLeague, array $dataResponse,int $nbList)
    {

        self::assertArrayHasKey('tier', $dataLeague);
        self::assertSame($dataLeague['tier'], $dataResponse['tier']);
        self::assertArrayHasKey('leagueId', $dataLeague);
        self::assertSame($dataLeague['leagueId'], $dataResponse['leagueId']);
        self::assertArrayHasKey('queue', $dataLeague);
        self::assertSame($dataLeague['queue'], $dataResponse['queue']);
        self::assertArrayHasKey('name', $dataLeague);
        self::assertSame($dataLeague['name'], $dataResponse['name']);
        self::assertArrayHasKey('entries', $dataLeague);
        self::assertCount($nbList, $dataLeague['entries']);
    }
}