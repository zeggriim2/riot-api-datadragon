<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon;

use Zeggriim\RiotApiDatadragon\base\BaseApi;
use Zeggriim\RiotApiDatadragon\Enum\TypeReturn;
use Zeggriim\RiotApiDatadragon\Enum\UrlDataDragon;
use Zeggriim\RiotApiDatadragon\Model\Champion\ChampionData;
use Zeggriim\RiotApiDatadragon\Model\Champion\ChampionDetail;
use Zeggriim\RiotApiDatadragon\Model\Champion\ChampionMetadata;
use Zeggriim\RiotApiDatadragon\Model\Item\Item;
use Zeggriim\RiotApiDatadragon\Model\Summoner\SummonerData;
use Zeggriim\RiotApiDatadragon\Model\Summoner\SummonerMetadata;
use Zeggriim\RiotApiDatadragon\Serializer\Denormalizer;
use Zeggriim\RiotApiDatadragon\Serializer\DenormalizerArray;

class DataDragonApi extends BaseApi
{
    public function __construct(
        private string $version,
        private string $lang,
    ) {
        parent::__construct();
    }

    /**
     *
     * Retourne la liste de toutes les Versions
     * @return array<array-key,string>
     */
    public function getVersions(): array
    {
        return $this->makeCall(UrlDataDragon::URL_VERSIONS);
    }

    /**
     *
     * Retourne la liste de toutes les Languages
     * @return array<array-key,string|ChampionData>
     */
    public function getLanguages(): array
    {
        return $this->makeCall(UrlDataDragon::URL_LANGUAGES);
    }

    /**
     * Retourne la liste de toutes les Champions
     * @return array|ChampionMetadata
     */
    public function getChampions(int $typeReturn = TypeReturn::RETURN_ARRAY)
    {
        $url = BuildUrl::build(UrlDataDragon::URL_CHAMPIONS, [
            "version" => $this->version,
            "lang" => $this->lang
        ]);

        $data = $this->makeCall($url);
        if ($typeReturn === TypeReturn::RETURN_ARRAY) {
            return $data;
        }

        $denormalizer = new Denormalizer();
        return $denormalizer->denormalize($data, ChampionMetadata::class);
    }

    /**
     * Retourne la le détail d'un Champion
     * @return array<string,ChampionDetail>
     */
    public function getChampion(string $name, int $typeReturn = TypeReturn::RETURN_ARRAY): array
    {
        $url = BuildUrl::build(UrlDataDragon::URL_CHAMPION, [
            "version" => $this->version,
            "lang" => $this->lang,
            "name" => ucfirst($name)
        ]);

        $data = $this->makeCall($url);
        if ($typeReturn === TypeReturn::RETURN_ARRAY) {
            return $data;
        }

        $denormalizeArray = new DenormalizerArray();
        return $denormalizeArray->denormalize($data['data'], ChampionDetail::class);
    }

    /**
     * @return array<string,Item> // TODO gerer le cas en array & object
     */
    public function getItems()
    {
        $url = BuildUrl::build(UrlDataDragon::URL_ITEMS, [
            "version" => $this->version,
            "lang" => $this->lang
        ]);

        $data = $this->makeCall($url);
        $denormalizeArray = new DenormalizerArray();
        return $denormalizeArray->denormalize($data['data'], Item::class);
    }

    public function getSummoner(): SummonerMetadata
    {
        $url = BuildUrl::build(UrlDataDragon::URL_SUMMONER, [
            "version" => $this->version,
            "lang" => $this->lang
        ]);

        $data = $this->makeCall($url);
        $denormalizer = new Denormalizer();
        return $denormalizer->denormalize($data, SummonerMetadata::class);
    }
}
