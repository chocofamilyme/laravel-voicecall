<?php

namespace Chocofamilyme\LaravelVoiceCall\Providers;

use Chocofamilyme\LaravelVoiceCall\Exceptions\VoicecallClientErrorException;
use Chocofamilyme\LaravelVoiceCall\Exceptions\VoicecallFatalErrorException;
use GuzzleHttp\Exception\ClientException;

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
     * @return array
     * @throws VoicecallClientErrorException
     * @throws VoicecallFatalErrorException
     */
    public function call(array $phones): array
    {
        try {
            $res = $this->guzzleClient->post('create', [
                'json' => [
                    'apiKey' => $this->config['api_key'],
                    'phones' => $phones,
                    'record' => [
                        'id' => $this->config['record_id'],
                    ],
                ],
            ]);

            return json_decode($res->getBody()->getContents(), true);
        } catch (ClientException $exception) {
            throw new VoicecallClientErrorException($this->getClientExceptionMessage($exception));
        } catch (\Throwable $exception) {
            throw new VoicecallFatalErrorException($exception->getMessage());
        }
    }

    /**
     * @param ClientException $exception
     * @return string
     */
    private function getClientExceptionMessage(ClientException $exception): string
    {
        $res = $exception->getResponse();
        if ($res) {
            return json_decode($res->getBody()->getContents(), true)['data']['message'] ?? $exception->getMessage();
        }

        return $exception->getMessage();
    }
}
