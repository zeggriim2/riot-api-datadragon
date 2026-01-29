<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDataDragon\Tests\DataDragon\Endpoint;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Zeggriim\RiotApiDataDragon\DataDragon\Dto\Language\Language;
use Zeggriim\RiotApiDataDragon\Tests\Traits\RiotApiDataDragonTrait;

/**
 * @group dragon
 *
 * @internal
 *
 * @coversDefaultClass \Zeggriim\RiotApiDataDragon\DataDragon\Endpoint\LanguageApi
 */
final class LanguageApiTest extends KernelTestCase
{
    use RiotApiDataDragonTrait;

    public function testGetLanguages(): void
    {
        $data = ['en_US', 'cs_CZ', 'de_DE', 'en_GB', 'en_PH', 'fr_FR', 'zh_MY'];

        $languageApi = $this->getLanguageApi($data);
        $languages = $languageApi->getLanguages();

        self::assertNotEmpty($languages);
        self::assertCount(\count($data), $languages);
        self::assertSame($data[0], $languages[0]);
        self::assertSame($data[1], $languages[1]);
        self::assertSame($data[2], $languages[2]);
        self::assertSame($data[3], $languages[3]);
        self::assertSame($data[4], $languages[4]);
        self::assertSame($data[5], $languages[5]);
        self::assertSame($data[6], $languages[6]);
    }

    public function testGetLanguageCollection(): void
    {
        $data = ['en_US', 'cs_CZ', 'de_DE', 'en_GB', 'en_PH', 'fr_FR', 'zh_MY'];

        $languageApi = $this->getLanguageApi($data);
        $languagesCollection = $languageApi->getLanguagesAsCollection();

        self::assertNotEmpty($languagesCollection->getLanguages());
        self::assertCount(\count($data), $languagesCollection->getLanguages());
        self::assertSame(\count($data), $languagesCollection->count());
        self::assertTrue($languagesCollection->hasLanguage($data[0]));
        self::assertTrue($languagesCollection->getIterator()->offsetExists($data[0]));
        self::assertInstanceOf(Language::class, $languagesCollection->getLanguage($data[0]));
        self::assertSame($data[0], $languagesCollection->getLanguage($data[0])->code);
        self::assertNull($languagesCollection->getLanguage('test'));
    }
}
