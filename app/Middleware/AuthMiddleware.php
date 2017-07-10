<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Middleware;

class AuthMiddleware {
    
    public function __invoke($request, $response, $next){
        
 
    $response ->getBody()->write('SEBELUM MIDDLEWARE');
    $response = $next($request, $response);
    $response->getBody()->write('SETELAH MIDDLEWARE');
    
        return $response;
 
    }
    
    
}
