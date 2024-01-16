<?php

namespace App\Services;

use GuzzleHttp\Client;

class TermiiService
{
    private $apiKey;
    private $baseUrl;

    public function __construct()
    {
        $this->apiKey = config('services.termii.api_key');
        $this->baseUrl = config('services.termii.base_url', 'https://api.ng.termii.com/api/sms');
    }

    public function sendSMS($to, $from, $sms, $type = 'plain', $channel = 'generic')
    {
        $client = new Client();

        $response = $client->post($this->baseUrl . '/send', [
            'json' => [
                'api_key' => $this->apiKey,
                'to' => $to,
                'from' => $from,
                'sms' => $sms,
                'type' => $type,
                'channel' => $channel,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }

    public function sendBulkSMS($to, $from, $sms, $type = 'plain', $channel = 'generic')
    {
        $client = new Client();

        $response = $client->post($this->baseUrl . '/send/bulk', [
            'json' => [
                'api_key' => $this->apiKey,
                'to' => $to,
                'from' => $from,
                'sms' => $sms,
                'type' => $type,
                'channel' => $channel,
            ],
        ]);

        return json_decode($response->getBody(), true);
    }
}
