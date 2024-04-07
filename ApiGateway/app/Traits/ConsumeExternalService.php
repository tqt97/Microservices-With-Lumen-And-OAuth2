<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait ConsumeExternalService {

    public function consumeExternalService($method, $url, $params = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);
        $response = $client->request($method, $url, [
            'params' => $params,
            'headers' => $headers
        ]);
        return $response->getBody()->getContents();
    }
}
