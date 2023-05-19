<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Serializer;

class Denormalizer
{
    public function denormalize(array $data, string $type)
    {
        $serializer = SerializerFactory::create();

        return $serializer->denormalize($data, $type);
    }
}