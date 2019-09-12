<?php

namespace TeamZac\LaraPie;

use Illuminate\Support\Arr;

class Resource
{
    /** @var array */
    protected $attributes = [];

    public function __get($key)
    {
        return Arr::get($this->attributes, $key);
    }
}
