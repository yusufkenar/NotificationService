<?php


function successResponse($data, $message, $status = 200)
{
    return response()->json([
        'error' => false,
        'message' => $message,
        'statusCode' => $status,
        'data' => $data
    ], $status);
}

function errorResponse($message, $status = 422)
{
    return response()->json([
        'error' => true,
        'message' => $message,
        'statusCode' => $status,
        'data' => []
    ], $status);
}
