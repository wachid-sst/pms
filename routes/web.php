<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// For system routing




$app->get('/',  function($request, $response) {
    return $this->view->render($response, 'home.twig');
});


$app->get('/user','\App\Controllers\UserController:index');

