<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataLeague\Endpoint;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataLeague\Dto\Summoner;
use Zeggriim\RiotApiDataDragon\RiotApiDataLeagueClient;

class SummonerApi implements SummonerApiInterface
{
    private const URL_SUMMONER = '/lol/summoner/v4/summoners/by-puuid/%s';

    public function __construct(
        private readonly RiotApiDataLeagueClient $riotApiDataLeague,
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function getSummoner(string $puuid): array
    {
        $url = \sprintf(self::URL_SUMMONER, $puuid);

        return $this->riotApiDataLeague->get($url)->toArray();
    }

    public function getSummonerAsObject(string $puuid): Summoner
    {
        $url = \sprintf(self::URL_SUMMONER, $puuid);

        $summoner = $this->riotApiDataLeague->get($url)->toArray();

        return $this->denormalizer->denormalize($summoner, Summoner::class);
    }
}
