<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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
            
        } catch (Exception $ex) {
            
            die('token failed');

        }
        
    }
}
