<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Exception;

class UnsupportedMediaTypeException extends \Exception
{
    protected $message = 'LeagueAPI: Unsupported media type';
}
