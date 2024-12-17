<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

abstract class Controller
{
    protected function response(array $params = []): JsonResponse
        {
            return response()->json([
                'status' => $params['status'],
                'message' => __($params['message']),
                'data' => $params['data']??null,
                'error' => $params['error']??null,
            ], $params['code']??200);
        }
}
