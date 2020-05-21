<?php

namespace Chocofamilyme\LaravelVoiceCall;

use Chocofamilyme\LaravelVoiceCall\Contracts\Voicecall;

class VoicecallService
{
    /**
     * @var Voicecall
     */
    private $voicecall;

    /**
     * Voicecall constructor.
     */
    public function __construct()
    {
        $this->voicecall = app(Voicecall::class);
    }

    /**
     * @return static
     */
    public static function create(): self
    {
        return new self();
    }

    /**
     * @param array $phones
     * @return void
     */
    public function call(array $phones): void
    {
        $this->voicecall->call($phones);
    }
}
