<?php

namespace Zeggriim\RiotApiDatadragon\Tests\Traits;

use Zeggriim\RiotApiDatadragon\Model\General\Image;

trait AssertImageTrait
{
    public function assertImage(Image $image): void
    {
        $this->assertIsString($image->getFull());
        $this->assertIsString($image->getSprite());
        $this->assertIsString($image->getGroup());
        $this->assertIsInt($image->getX());
        $this->assertIsInt($image->getY());
        $this->assertIsInt($image->getW());
        $this->assertIsInt($image->getH());
    }
}