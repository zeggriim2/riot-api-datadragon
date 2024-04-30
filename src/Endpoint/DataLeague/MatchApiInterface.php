<?php

namespace Zeggriim\RiotApiDataDragon\Endpoint\DataLeague;

interface MatchApiInterface
{
    public function getMatchs(string $puuidSummoner): array;
    public function getMatch(string $idMatch): array;
    public function getMatchTimeLine(string $idMatch): array;
}