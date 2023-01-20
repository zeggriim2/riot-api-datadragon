<?php

declare(strict_types=1);

namespace Zeggriim\RiotApiDatadragon\Serializer;

use Zeggriim\RiotApiDatadragon\Model\Champion;

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