<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon;

class BuildUrl implements build
{
    /**
     * @param array<string,string> $params
     */
    public static function build(string $url, array $params): string
    {
        foreach ($params as $key => $param) {
            $url = str_replace("{{$key}}", $param, $url);
        }

        return $url;
    }
}