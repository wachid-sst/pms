<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use App\Middleware\JwtMiddleware;
$app ->group('/api', function (){
    
   $this->post('/login', '\App\Controllers\UserController:login');

   $this->group('/mesin', function (){
   
       $this->get('/', '\App\Controllers\MesinController:index');
       $this->post('/', '\App\Controllers\MesinController:store')->add(new JwtMiddleware);
       $this->get('/{id}', '\App\Controllers\MesinController:show');
       
   }); 
});