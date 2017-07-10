<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$app ->group('/api', function (){

   $this->group('/mesin', function (){
   
       $this->get('', '\App\Controllers\MesinController:index');
       $this->get('/{id}', '\App\Controllers\MesinController:show');
       
   }); 
});