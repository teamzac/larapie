<?php

namespace TeamZac\LaraPie;

use Illuminate\Support\Facades\Facade;

class LaraPie extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return FeedFactory::class;
    }
}
