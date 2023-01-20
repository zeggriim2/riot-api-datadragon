<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Serializer;

class DenormalizerArray
{
    public function denormalize(array $datas, string $type): array
    {
        $serializer = SerializerFactory::create();

        $dataObjet = [];
        foreach ($datas as $key => $data) {
            $dataObjet[$key] = $serializer->denormalize($data, $type);
        }

        return $dataObjet;
    }
}