<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon;

interface build
{
    public static function build(string $url, array $params):string ;
}