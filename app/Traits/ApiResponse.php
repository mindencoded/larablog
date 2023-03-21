<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    public function apiResponse($data = null, int $code = 200, string $message = ''): JsonResponse {
        return response()->json(['data' => $data, 'code' => $code, 'message' => $message]);
    }
}
