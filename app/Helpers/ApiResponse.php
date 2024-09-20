<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ApiResponse
{
    public static function success($data = [], $message = 'Success', $code = 200): JsonResponse
    {
        $json = [
            'status' => true,
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($json, $code);
    }

    public static function error($message = 'An error occurred', $data = [], $code = 400): JsonResponse
    {
        $json = [
            'status' => false,
            'message' => $message,
            'data' => $data,
        ];
        return response()->json($json, $code);
    }
}
