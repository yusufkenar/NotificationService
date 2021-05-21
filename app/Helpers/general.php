<?php

use Illuminate\Http\JsonResponse;

function successResponse($data, $message = null, $status = 200): JsonResponse
{
    return response()->json([
        'error' => false,
        'errorCode' => null,
        'message' => $message,
        'statusCode' => $status,
        'data' => $data
    ], $status);
}

function errorResponse($message, $errorCode = null, $status = 422): JsonResponse
{
    return response()->json([
        'error' => true,
        'errorCode' => $errorCode,
        'message' => $message,
        'statusCode' => $status,
        'data' => []
    ], $status);
}
