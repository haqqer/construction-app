<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RespondController extends Controller
{
    public function sendResponse($status, $message, $code, $data)
    {
        return response()->json([
            "status" => $status,
            "message" => $message,
            "code" => $code,
            "result" => $data
        ], $code);
   }

   public function countData($data) 
   {
       return count($data);
   }
}
