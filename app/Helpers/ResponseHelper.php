<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function success($message, $data = null)
    {
        $response = [
            'status' => 'success',
            'message' => $message,
        ];

        if ($data) {
            $response['data'] = $data;
        }

        return $response;
    }

    public static function error($message, $debugMessage = null, $code = null)
    {
        $response = [
            'status' => 'error',
            'message' => $message,
        ];

        if ($debugMessage && config('app.debug')) {
            $response['debugMessage'] = $debugMessage;
        }
    
        return $response;
    }
}