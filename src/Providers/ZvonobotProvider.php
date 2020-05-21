<?php

namespace Chocofamilyme\LaravelVoiceCall\Providers;

class ZvonobotProvider extends BaseProvider
{
    /**
     * @return string
     */
    public function getProvider(): string
    {
        return 'zvonobot';
    }

    /**
     * @param array $phones
     * @return void
     */
    public function call(array $phones): void
    {
        $this->guzzleClient->post('create', [
            'apiKey' => $this->config['api_key'],
            'phones' => $phones,
            'record' => [
                'id' => $this->config['record_id'],
            ]
        ]);
    }
}
