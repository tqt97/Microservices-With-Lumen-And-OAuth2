<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumeExternalService {

    public function performRequest($method, $url, $formParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);
        $response = $client->request($method, $url, [
            'form_params' => $formParams,
            'headers' => $headers
        ]);
        return $response->getBody()->getContents();
    }
}
