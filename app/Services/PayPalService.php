<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class PayPalService
{
    private $baseUrl;
    private $clientId;
    private $secret;

    public function __construct()
    {
        $this->baseUrl = config('services.paypal.sandbox.app_url');
        $this->clientId = config('services.paypal.sandbox.client_id');
        $this->secret = config('services.paypal.sandbox.secret');
    }

    private function getAccessToken()
    {
        $response = Http::withBasicAuth($this->clientId, $this->secret)
            ->asForm()
            ->post($this->baseUrl . '/v1/oauth2/token', [
                'grant_type' => 'client_credentials'
            ]);

        return $response['access_token'];
    }

    public function createOrder($amount)
    {
        $token = $this->getAccessToken();

        return Http::withToken($token)
            ->post($this->baseUrl . '/v2/checkout/orders', [
                "intent" => "CAPTURE",
                "purchase_units" => [[
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $amount
                    ]
                ]]
            ])->json();
    }

    public function captureOrder($orderId)
    {
        $token = $this->getAccessToken();

        return Http::withToken($token)
            ->post($this->baseUrl . "/v2/checkout/orders/{$orderId}/capture")
            ->json();
    }
}