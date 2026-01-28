<?php

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

interface MatchApiInterface
{
    public function getMatchs(string $puuidSummoner): array;

    public function getMatch(string $idMatch): array;

    public function getMatchTimeLine(string $idMatch): array;
}
