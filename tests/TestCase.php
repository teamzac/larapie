<?php

namespace TeamZac\LaraPie\Tests;

use Orchestra\Testbench\TestCase as BaseTest;

class TestCase extends BaseTest
{
    protected function getPackageProviders($app)
    {
        return [
            'TeamZac\LaraPie\LaraPieServiceProvider'
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'LaraPie' => 'TeamZac\LaraPie\LaraPie'
        ];
    }
}
