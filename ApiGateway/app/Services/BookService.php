<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class BookService
{
    use ConsumeExternalService;

    public $baseUri;

    public function __construct(){
        $this->baseUri = config('services.books.base_uri');
    }

    public function getAll(){
        return $this->performRequest('GET', '/books');
    }

    public function create($data){
        return $this->performRequest('POST', '/books', $data);
    }

    public function show($id){
        return $this->performRequest('GET', "/books/{$id}");
    }

    public function getById($id){
        return $this->performRequest('GET', "/books/{$id}");
    }

    public function update($data, $id){
        return $this->performRequest('PUT', "/books/{$id}", $data);
    }

    public function delete($id){
        return $this->performRequest('DELETE', "/books/{$id}");
    }
}
