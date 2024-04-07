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
}
