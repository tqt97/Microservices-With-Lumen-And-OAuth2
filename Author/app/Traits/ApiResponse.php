<?php

namespace App\Traits;

trait ApiResponse
{
    public function success($data = null, $code = 200)
    {
        return response()->json([
            // 'message' => $message,
            'data' => $data
        ], $code);
    }

    public function error($message = null, $code = 400)
    {
        return response()->json([
            'error' => $message,
            'code' => $code
        ], $code);
    }
}
