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
     * @param array $content
     * @param integer $code
     * @return JsonResponse
     */
    protected function getResponseJson(array $content, $code = 200) :JsonResponse
    {
        return response()->json([
            'data' => [
                $content
            ]
        ], $code);
    }
}
