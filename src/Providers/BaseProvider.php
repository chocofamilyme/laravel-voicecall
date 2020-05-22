<?php

namespace Chocofamilyme\LaravelVoiceCall\Providers;

use Chocofamilyme\LaravelVoiceCall\Contracts\Voicecall;
use GuzzleHttp\Client;

abstract class BaseProvider implements Voicecall
{
    /**
     * @var array
     */
    protected $config;

    /**
     * @var Client
     */
    protected $guzzleClient;

    /**
     * BaseProvider constructor.
     */
    public function __construct()
    {
        $this->config = config('voicecall.providers')[$this->getProvider()] ?? [];
        $this->guzzleClient = new Client([
            'base_uri' => $this->config['base_uri'],
        ]);
    }
}
