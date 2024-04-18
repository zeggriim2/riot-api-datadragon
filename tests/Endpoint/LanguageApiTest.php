<?php
declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\Endpoint;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zeggriim\RiotApiDataDragon\Endpoint\LanguageApi;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataDragonTrait;

class LanguageApiTest extends KernelTestCase
{
    use RiotApiDataDragonTrait;

    public function testGetLanguages()
    {
        $data = ['en_US', 'cs_CZ', 'de_DE', 'en_GB','en_PH', 'fr_FR', 'zh_MY'];

        $riotApiDataDragon = $this->getClientRiotApi($data);

        $languageApi = new LanguageApi($riotApiDataDragon);
        $languages = $languageApi->getLanguages();

        self::assertIsArray($languages);
        self::assertCount(count($data), $languages);
        self::assertSame($data[0], $languages[0]);
        self::assertSame($data[1], $languages[1]);
        self::assertSame($data[2], $languages[2]);
        self::assertSame($data[3], $languages[3]);
        self::assertSame($data[4], $languages[4]);
        self::assertSame($data[5], $languages[5]);
        self::assertSame($data[6], $languages[6]);
    }
}
