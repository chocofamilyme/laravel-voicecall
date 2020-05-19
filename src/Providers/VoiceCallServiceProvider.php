<?php

namespace Chocofamilyme\LaravelVoiceCall\Providers;

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
            __DIR__.'/../config/voicecall.php', 'voicecall'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/voicecall.php' => config_path('voicecall.php'),
        ]);
    }
}
