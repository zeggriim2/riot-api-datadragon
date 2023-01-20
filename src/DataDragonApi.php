<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon;

use Zeggriim\RiotApiDatadragon\base\BaseApi;
use Zeggriim\RiotApiDatadragon\Enum\TypeReturn;
use Zeggriim\RiotApiDatadragon\Enum\UrlDataDragon;
use Zeggriim\RiotApiDatadragon\Model\Champion;
use Zeggriim\RiotApiDatadragon\Model\ChampionDetail;
use Zeggriim\RiotApiDatadragon\Model\Item;
use Zeggriim\RiotApiDatadragon\Model\Summoner;
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
     * @return array<array-key,string|Champion>
     */
    public function getLanguages(): array
    {
        return $this->makeCall(UrlDataDragon::URL_LANGUAGES);
    }

    public function getChampions(int $typeReturn = TypeReturn::RETURN_ARRAY)
    {
        $url = $this->constructUrl(UrlDataDragon::URL_CHAMPIONS, [
            "version" => $this->version,
            "lang" => $this->lang
        ]);

        $data = $this->makeCall($url);
        if ($typeReturn === TypeReturn::RETURN_ARRAY) {
            return $data;
        }

        $denormalizeArray = new DenormalizerArray();
        return $denormalizeArray->denormalize($data['data'], Champion::class);
    }

    public function getChampion(string $name, int $typeReturn = TypeReturn::RETURN_ARRAY)
    {
        $url = $this->constructUrl(UrlDataDragon::URL_CHAMPION, [
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

    public function getItems()
    {
        $url = $this->constructUrl(UrlDataDragon::URL_ITEMS, [
            "version" => $this->version,
            "lang" => $this->lang
        ]);

        $data = $this->makeCall($url);
        $denormalizeArray = new DenormalizerArray();
        return $denormalizeArray->denormalize($data['data'], Item::class);
    }

    public function getSummoner()
    {
        $url = $this->constructUrl(UrlDataDragon::URL_SUMMONER, [
            "version" => $this->version,
            "lang" => $this->lang
        ]);

        $data = $this->makeCall($url);
        $denormalizeArray = new DenormalizerArray();
        return $denormalizeArray->denormalize($data['data'], Summoner::class);
    }

    /**
     * @param array<string,string> $params
     */
    private function constructUrl(string $url, array $params): string
    {
        foreach ($params as $key => $param) {
            $url = str_replace("{{$key}}", $param, $url);
        }

        return $url;
    }
}
