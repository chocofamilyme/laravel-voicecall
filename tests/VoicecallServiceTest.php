<?php

namespace Chocofamilyme\LaravelVoiceCall\Tests;

use Chocofamilyme\LaravelVoiceCall\VoicecallService;

class VoicecallServiceTest extends TestCase
{
    public function testCall(): void
    {
        $this->assertIsArray(VoicecallService::create()->call([]));
    }
}