<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// For system routing
require_once '../helper/validation_helper.php';

use DavidePastore\Slim\Validation\Validation;

use App\Controllers\UserController;
use App\Controllers\HomeController;
use App\Middleware\AuthMiddleware;


    $app->get('/',HomeController::class.':index');//->add(new AuthMiddleware());
    
    // Register CSRF
    
    $app->add($container->get('csrf'));
    
    $app->get('/login',HomeController::class.':login');
    $app->post('/login',HomeController::class.':login_action');
    $app->get('/register',HomeController::class.':register')->setName('register');
    $app->post('/register',HomeController::class.':register_action')
                ->add(new Validation($register_validator)); 

    $app->get('/user',UserController::class.':index');
    $app->get('/user{id}',UserController::class.':detail');


$app->group('/member', function(){


 
    });