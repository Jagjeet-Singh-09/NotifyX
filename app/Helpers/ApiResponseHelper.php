<?php

namespace App\Helpers;
class ApiResponseHelper{

public static function apiSuccess($message,$data,$statusCode=200){

    return response()->setStatusCode($statusCode)
    ->setJSON([
        "message"=>$message,
        "data"=>$data,
        "statusCode"=>$statusCode
    ]);
}

public static function apiError($message,$error,$statusCode=400){

    return response()->setStatusCode($statusCode)
    ->setJSON([
        "message"=>$message,
        "error"=>$error,
        "statusCode"=>$statusCode
    ]);
}

}