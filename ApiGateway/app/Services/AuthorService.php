<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class AuthorService
{
    use ConsumeExternalService;

    public $baseUri;

    // public $secret;

    public function __construct(){
        $this->baseUri = config('services.authors.base_uri');
        // $this->secret  = config('services.authors.secret');
    }

    public function getAll(){
        return $this->performRequest('GET', '/authors');
    }

    public function create($data){
        return $this->performRequest('POST', '/authors', $data);
    }

    public function show($id){
        return $this->performRequest('GET', "/authors/{$id}");
    }

    public function getById($id){
        return $this->performRequest('GET', "/authors/{$id}");
    }

    public function update($data, $id){
        return $this->performRequest('PUT', "/authors/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/authors/{$id}");
    }
}
