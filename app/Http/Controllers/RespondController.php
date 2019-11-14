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
        ], $code)
            ->header("Access-Control-Allow-Origin: *")
            ->header('Access-Control-Allow-Methods: POST,GET,PUT,PATCH,OPTIONS')
            ->header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');;
    }
}
