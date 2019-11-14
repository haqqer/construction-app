<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        try {
            $jwt = JWTAuth::parseToken()->authenticate();
            
        } catch (Exception $e) {
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException)
            {
                return response()->json(['message' => 'Token is invalid'], 400);
            } 
            else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException)
            {
                return response()->json(['message' => 'Token is expired'], 401);
            }
            else
            {
                return response()->json(['message' => 'Authorization Token Not Found'], 403);
            }
        }
        return $next($request)
                ->header("Access-Control-Allow-Origin: *")
                ->header('Access-Control-Allow-Methods: POST,GET,PUT,PATCH,OPTIONS')
                ->header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
    }
}
