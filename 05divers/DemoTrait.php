<?php

namespace App05;

trait DemoTrait
{
    public string $name = '';

    public function upperName()
    {
        return strtoupper($this->name);
    }
}
