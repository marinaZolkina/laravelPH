<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait HttpClientTrait
{
    /**
     * Integrate to the provided API
     */
    public function loginToApi()
    {
        $result = ['status' => null, 'content' => ''];

        $client = new Client();
        $response = $client->request('POST', env('API_URL') . 'access-token', [
            'form_params' => [
                'client_id' => env('API_LOGIN'),
                'client_secret' => env('API_PASSWORD'),
            ]
        ]);

        $responseStatus = $response->getStatusCode();
        $result['status'] = $responseStatus;

        if ($responseStatus == 200) {
            $responseBody = json_decode((string)$response->getBody());
            $result['content'] = $responseBody->access_token;

        } else {
            $result['content'] = 'Error receiving the token, please try again after some time';
        }

        return $result;
    }

    public function getRandomStringToApi($token)
    {
        $result = ['status' => null, 'content' => ''];

        $client = new Client(['headers' => [
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Authorization' => 'Bearer ' . $token
        ]]);
        $response = $client->request('GET', env('API_URL') . 'get-random-test-feed');

        $responseStatus = $response->getStatusCode();
        $result['status'] = $responseStatus;

        if ($responseStatus == 200) {
            $result['content'] = json_decode((string)$response->getBody());

        } else {
            $result['content'] = 'Error get string, please try again after some time';
        }

        return $result;
    }

}
