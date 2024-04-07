<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponse
{
    public function success($data = null, $code = 200)
    {
        return response($data, $code)->header('Content-Type', 'application/json');
    }

    public function error($message = null, $code = 400)
    {
        return response()->json([
            'error' => $message,
            'code' => $code
        ], $code);
    }

    public function validResponse($data, $code = Response::HTTP_OK)
    {
        return response()->json(['data' => $data], $code);
    }

    public function errorMessage($message, $code)
    {
        return response($message, $code)->header('Content-Type', 'application/json');
    }
}
