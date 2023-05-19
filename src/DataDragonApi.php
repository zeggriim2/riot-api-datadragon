<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon;

use Zeggriim\RiotApiDatadragon\base\BaseApi;
use Zeggriim\RiotApiDatadragon\Enum\TypeReturn;
use Zeggriim\RiotApiDatadragon\Enum\UrlDataDragon;
use Zeggriim\RiotApiDatadragon\Exception\EmptyArgument;
use Zeggriim\RiotApiDatadragon\Model\Champion\ChampionData;
use Zeggriim\RiotApiDatadragon\Model\Champion\ChampionDetail;
use Zeggriim\RiotApiDatadragon\Model\Champion\ChampionMetadata;
use Zeggriim\RiotApiDatadragon\Model\GameMode;
use Zeggriim\RiotApiDatadragon\Model\GameType;
use Zeggriim\RiotApiDatadragon\Model\Item\Item;
use Zeggriim\RiotApiDatadragon\Model\Map;
use Zeggriim\RiotApiDatadragon\Model\Queue;
use Zeggriim\RiotApiDatadragon\Model\Season;
use Zeggriim\RiotApiDatadragon\Model\Summoner\SummonerMetadata;
use Zeggriim\RiotApiDatadragon\Serializer\Denormalizer;
use Zeggriim\RiotApiDatadragon\Serializer\DenormalizerArray;

class DataDragonApi extends BaseApi
{
    public function __construct(
        private ?string $version = null,
        private ?string $lang = null,
    ) {
        parent::__construct();
    }

    public function setVersion(string $version)
    {
        $this->version = $version;
    }

    public function setLang(string $lang)
    {
        $this->lang = $lang;
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
     * Retourne la liste de toutes les Maps
     * @return array<array-key,array<string,int|string>>|Map[]
     */
    public function getMaps(int $typeReturn = TypeReturn::RETURN_ARRAY): array
    {
        $data = $this->makeCall(UrlDataDragon::URL_STATIC_MAPS);
        if ($typeReturn === TypeReturn::RETURN_ARRAY) {
            return $data;
        }
        $denormalizeArray = new DenormalizerArray();
        return $denormalizeArray->denormalize($data, Map::class);
    }

    /**
     *
     * Retourne la liste de toutes les Maps
     * @return array<array-key,array<string,int|string>>|Season[]
     */
    public function getSeasons(int $typeReturn = TypeReturn::RETURN_ARRAY): array
    {
        $data = $this->makeCall(UrlDataDragon::URL_STATIC_SEASONS);
        if ($typeReturn === TypeReturn::RETURN_ARRAY) {
            return $data;
        }
        $denormalizeArray = new DenormalizerArray();
        return $denormalizeArray->denormalize($data, Season::class);
    }

    /**
     *
     * Retourne la liste de toutes les Maps
     * @return array<array-key,array<string,int|string|null>>|Queue[]
     */
    public function getQueues(int $typeReturn = TypeReturn::RETURN_ARRAY): array
    {
        $data = $this->makeCall(UrlDataDragon::URL_STATIC_QUEUES);
        if ($typeReturn === TypeReturn::RETURN_ARRAY) {
            return $data;
        }
        $denormalizeArray = new DenormalizerArray();
        return $denormalizeArray->denormalize($data, Queue::class);
    }

    /**
     *
     * Retourne la liste de toutes les Maps
     * @return array<array-key,array<string,string>>|GameMode[]
     */
    public function getGameModes(int $typeReturn = TypeReturn::RETURN_ARRAY): array
    {
        $data = $this->makeCall(UrlDataDragon::URL_STATIC_GAME_MODES);
        if ($typeReturn === TypeReturn::RETURN_ARRAY) {
            return $data;
        }
        $denormalizeArray = new DenormalizerArray();
        return $denormalizeArray->denormalize($data, GameMode::class);
    }

    /**
     *
     * Retourne la liste de toutes les Maps
     * @return array<array-key,array<string,string>>|GameType[]
     */
    public function getGameTypes(int $typeReturn = TypeReturn::RETURN_ARRAY): array
    {
        $data = $this->makeCall(UrlDataDragon::URL_STATIC_GAME_TYPES);
        if ($typeReturn === TypeReturn::RETURN_ARRAY) {
            return $data;
        }
        $denormalizeArray = new DenormalizerArray();
        return $denormalizeArray->denormalize($data, GameType::class);
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
        if (is_null($this->version) || is_null($this->lang)) {
            throw new EmptyArgument("Version or Lang is null");
        }

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
        if (is_null($this->version) || is_null($this->lang)) {
            throw new EmptyArgument("Version or Lang is null");
        }

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
        if (is_null($this->version) || is_null($this->lang)) {
            throw new EmptyArgument("Version or Lang is null");
        }

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
        if (is_null($this->version) || is_null($this->lang)) {
            throw new EmptyArgument("Version or Lang is null");
        }

        $url = BuildUrl::build(UrlDataDragon::URL_SUMMONER, [
            "version" => $this->version,
            "lang" => $this->lang
        ]);

        $data = $this->makeCall($url);
        $denormalizer = new Denormalizer();
        return $denormalizer->denormalize($data, SummonerMetadata::class);
    }
}
