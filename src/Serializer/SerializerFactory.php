<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Serializer;


use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

class SerializerFactory
{
    private static $serializer = null;

    public static function create(): SymfonySerializer
    {
        if (is_null(self::$serializer)) {
            $normalizer = new ObjectNormalizer(
                null,
                null,
                null,
                new ReflectionExtractor()
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
