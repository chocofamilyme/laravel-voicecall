<?php

namespace Chocofamilyme\LaravelVoiceCall\Contracts;

interface Voicecall
{
    public function getProvider(): string;

    public function call(array $phones): void;
}
