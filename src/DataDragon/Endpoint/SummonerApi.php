<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\DataDragon\Endpoint;

use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Summoner\SummonerCollection;
use Zeggriim\RiotApiDataDragon\RiotApiDataDragonClient;

class SummonerApi implements SummonerApiInterface
{
    private const URL_SUMMONER = '/cdn/%s/data/%s/summoner.json';

    public function __construct(
        private readonly RiotApiDataDragonClient $riotApiDataDragon,
        private readonly DenormalizerInterface $denormalizer,
    ) {
    }

    public function getSummoner(string $version, string $locale = 'fr_FR'): array
    {
        return $this->riotApiDataDragon->get(\sprintf(self::URL_SUMMONER, $version, $locale))->toArray();
    }

    public function getSummonerAsCollection(string $version, string $locale = 'fr_FR'): SummonerCollection
    {
        $summonerData = $this->riotApiDataDragon->get(\sprintf(self::URL_SUMMONER, $version, $locale))->toArray();

        return $this->denormalizer->denormalize($summonerData, SummonerCollection::class);
    }
}
