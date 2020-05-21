<?php

namespace Chocofamilyme\LaravelVoiceCall\Providers;

class MockProvider extends BaseProvider
{
    /**
     * @return string
     */
    public function getProvider(): string
    {
        return '';
    }

    public function call(): void
    {
        //
    }
}
