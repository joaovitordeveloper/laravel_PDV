<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

/**
 * @author João Vitor Boltelho <developer.joaovitor@gmail.com>
 */
abstract class Controller
{
    /**
     * Method that returns the JSON to the end-user
     *
     * @param string $message
     * @param integer $code
     * @return JsonResponse
     */
    protected function getResponseJson(string $message, $code = 200) :JsonResponse
    {
        return response()->json([
            'data' => [
                'message' => $message
            ]
        ], $code);
    }
}
