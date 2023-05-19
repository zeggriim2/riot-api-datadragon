<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Serializer;

use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\PropertyInfo\PropertyInfoExtractor;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

class SerializerFactory
{
    private static $serializer;

    public static function create(): SymfonySerializer
    {
        if (null === self::$serializer) {
            $phpDocExtractor     = new PhpDocExtractor();
            $reflectionExtractor = new ReflectionExtractor();

            $normalizer = new ObjectNormalizer(
                null,
                null,
                null,
                new PropertyInfoExtractor(
                    [$phpDocExtractor, $reflectionExtractor],
                    [$phpDocExtractor, $reflectionExtractor]
                )
            );

            self::$serializer = new \Symfony\Component\Serializer\Serializer(
                [
                    new ArrayDenormalizer(),
                    new DateTimeNormalizer(),
                    $normalizer,
                ]
            );
        }

        return self::$serializer;
    }
}
