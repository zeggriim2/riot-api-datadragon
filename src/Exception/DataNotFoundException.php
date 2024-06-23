<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Exception;

class DataNotFoundException extends \Exception
{
    protected $message = 'LeagueAPI: Data not found';
}
