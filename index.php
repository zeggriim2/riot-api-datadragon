<?php

use Symfony\Component\Stopwatch\Stopwatch;
use Zeggriim\RiotApiDatadragon\DataDragonApi;
use Zeggriim\RiotApiDatadragon\Enum\Languages;

require_once 'vendor/autoload.php';

$api = new DataDragonApi("13.1.1", Languages::CODE_fr_FR);
$champions = $api->getSummoner();


