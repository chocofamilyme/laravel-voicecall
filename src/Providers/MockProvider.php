<?php

namespace Chocofamilyme\LaravelVoiceCall\Providers;

class MockProvider extends BaseProvider
{
    /**
     * @return string
     */
    public function getProvider(): string
    {
        return 'zvonobot';
    }

    public function call(array $phones): array
    {
        return [];
    }
}
