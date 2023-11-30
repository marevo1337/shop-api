<?php

namespace App\UI\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class JsonResponseFactory
{
    public function success(
        string $message = '',
        array  $data    = [],
        int    $status  = Response::HTTP_OK
    ): JsonResponse
    {
        return (new JsonResponse(
            [
                'message' => $message,
                'data'    => $data,
            ],
            $status
        ));
    }

    public function error(
        string $message = '',
        array  $data    = [],
        int    $status  = Response::HTTP_FORBIDDEN
    ): JsonResponse
    {
        return (new JsonResponse(
            [
                'message' => $message,
                'data'    => $data,
            ],
            $status
        ));
    }
}
