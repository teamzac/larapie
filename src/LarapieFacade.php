<?php

namespace Teamzac\Larapie;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Teamzac\Larapie\Skeleton\SkeletonClass
 */
class LarapieFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'larapie';
    }
}
