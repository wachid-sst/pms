<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * 10 July 2017
 */

namespace App\Middleware;
use \Firebase\JWT\JWT;

class JwtMiddleware {
    
    private $key = "jangandihafalsusahsekali";
    
    public function __invoke($request, $response, $next) {
        $jwt = $request->getHeader('Authorization')['0'];
        
        // decode token 
        
        try {
            $decoded = JWT::decode($jwt, $this->key, array ('HS256'));
        
            return $next($request, $response);
            
        } catch (\Exception $ex) {
            
            return $response->withJson([
                'success' => false,
                'message' => 'token failed'
            ],401);

        }
        
    }
}
