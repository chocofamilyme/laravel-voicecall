<?php

use Chocofamilyme\LaravelVoiceCall\Providers\ZvonobotProvider;

return [
    'default_provider' => env('VOICECALL_DEFAULT_PROVIDER', 'zvonobot'),
    'providers' => [
        'zvonobot' => [
            'base_url' => env('VOICECALL_ZVONOBOT_BASE_URL', 'https://lk.zvonobot.kz/apiCalls/'),
            'api_key' => env('VOICECALL_ZVONOBOT_API_KEY'),
            'record_id' => env('VOICECALL_ZVONOBOT_RECORD_ID', 493742),
            'handler' => ZvonobotProvider::class,
        ]
    ]
];