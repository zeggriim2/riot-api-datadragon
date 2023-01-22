<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Serializer;

use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

class SerializerFactory
{
    public static function create(): SymfonySerializer
    {
        $normalizer = new ObjectNormalizer(
            null,
            null,
            null,
            new ReflectionExtractor()
        );
        return new \Symfony\Component\Serializer\Serializer([new DateTimeNormalizer(), $normalizer]);
    }
}
