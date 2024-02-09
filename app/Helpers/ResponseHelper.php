<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function success($message, $data = null, $errorMessage = null)
    {
        $response = [
            'status' => 'success',
            'message' => $message,
        ];

        if ($data) {
            $response['data'] = $data;
        }

        if ($errorMessage && config('app.debug')) {
            $response['errorMessage'] = $errorMessage;
        }

        return $response;
    }

    public static function error($message, $errorMessage = null, $code = null)
    {
        $response = [
            'status' => 'error',
            'message' => $message,
        ];

        if ($errorMessage && config('app.debug')) {
            $response['errorMessage'] = $errorMessage;
        }
    
        return $response;
    }
}