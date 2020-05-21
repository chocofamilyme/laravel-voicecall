<?php

namespace Chocofamilyme\LaravelVoiceCall;

use Chocofamilyme\LaravelVoiceCall\Contracts\Voicecall;
use Chocofamilyme\LaravelVoiceCall\Providers\MockProvider;
use Illuminate\Support\ServiceProvider;

/**
 * Class VoiceCallServiceProvider
 *
 * @package Chocofamilyme\LaravelVoiceCall\Providers
 */
class VoiceCallServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        parent::register();

        $this->mergeConfigFrom(
            __DIR__ . '/../config/voicecall.php',
            'voicecall'
        );

        if (app()->environment() === 'testing') {
            $this->app->singleton(Voicecall::class, MockProvider::class);
        } else {
            $defaultProvider = config('voicecall.default_provider');
            $provider = config('voicecall.providers')[$defaultProvider];
            $this->app->singleton(Voicecall::class, $provider['handler']);
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__ . '/../config/voicecall.php' => config_path('voicecall.php'),
        ]);
    }
}
