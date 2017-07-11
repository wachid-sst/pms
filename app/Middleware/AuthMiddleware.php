<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * 10 July 2017
 */

namespace App\Middleware;

class AuthMiddleware 

{
    
    public function __invoke($request, $response, $next)
    {
 
    if(!isset($_SESSION['id']))
        {
        
        return $response->withRedirect('login');
 
        }
    
    
    }
}