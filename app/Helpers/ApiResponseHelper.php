<?php

namespace App\Helpers;
class ApiResponseHelper{

public static function apiResponseHandler($message,$data,$statusCode){

    return response()->setStatusCode($statusCode)
    ->setJSON([
        "message"=>$message,
        "data"=>$data,
        "statusCode"=>$statusCode
    ]);
}



}