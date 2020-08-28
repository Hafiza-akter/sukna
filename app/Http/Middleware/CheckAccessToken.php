<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use \Firebase\JWT\JWT;

class CheckAccessToken
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
        $token = $request->token;
        $secretKey = env('SECRET_KEY');

        try{
            $decoded = JWT::decode($token, $secretKey, array('HS256'));
            return $next($request);
        }
        catch(\Exception $e){
            // return response('Unauthorized.', 401);
            return response()->json(['status' => 0, 'statusCode' => 'E103', 'statusDetail' => 'invalid token']);
        }
   
    }
}
