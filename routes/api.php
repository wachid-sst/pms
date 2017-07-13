<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * Update 11 July 2017
 */

use App\Middleware\JwtMiddleware;
$app ->group('/api', function (){
    
   $this->post('/login', '\App\Controllers\UserController:login');
   $this->post('/register', '\App\Controllers\UserController:register');
   $this->group('/mesin', function (){
   
       $this->get('/', '\App\Controllers\MesinController:index')->add(new JwtMiddleware);
       $this->get('/{id}', '\App\Controllers\MesinController:show')->add(new JwtMiddleware);
       $this->post('/', '\App\Controllers\MesinController:store')->add(new JwtMiddleware);
       $this->put('/{id}', '\App\Controllers\MesinController:update')->add(new JwtMiddleware);
       $this->delete('/{id}', '\App\Controllers\MesinController:delete')->add(new JwtMiddleware);

   }); 
});