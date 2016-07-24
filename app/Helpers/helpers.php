<?php

use Illuminate\Support\Facades\Response;

function return_json($msg,$statusCode,$success=true)
{
    if($success==true)
    {
        return Response::json(['baslik'=>'İşlem Başarılı','msg' => $msg,'success'=>'success'], $statusCode);
    }
    else{
        return Response::json(['baslik'=>'Bir Sorunla Karşılaşıldı','msg' => $msg,'success'=>'error'], $statusCode);
    }

}