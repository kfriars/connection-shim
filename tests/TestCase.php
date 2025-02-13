<?php

namespace Kfriars\ConnectionShim\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Kfriars\ConnectionShim\ConnectionShimServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            ConnectionShimServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
    }
}
