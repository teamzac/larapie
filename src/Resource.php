<?php

namespace TeamZac\LaraPie;

use Illuminate\Support\Arr;

class Resource
{
    protected $attributes = [];

    public function __get($key)
    {
        return Arr::get($this->attributes, $key);
    }
}
