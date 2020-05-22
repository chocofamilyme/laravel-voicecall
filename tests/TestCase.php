<?php

namespace Chocofamilyme\LaravelVoiceCall\Tests;

use Chocofamilyme\LaravelVoiceCall\Contracts\Voicecall;
use Chocofamilyme\LaravelVoiceCall\Providers\MockProvider;
use Illuminate\Foundation\Application;
use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{

    public function setUp(): void
    {
        parent::setUp();
        $this->app->singleton(Voicecall::class, MockProvider::class);
        $this->app['config']->set('voicecall', require __DIR__.'/config/voicecall.php');
    }
    /**
     * Define environment setup.
     *
     * @param  Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
