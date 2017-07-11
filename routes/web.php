<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// For system routing

use App\Controllers\UserController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\DashboardController;


use App\Middleware\AuthMiddleware;

    $app->get('/',HomeController::class.':index')->add(new AuthMiddleware());
    
    // Register CSRF
    
    $app->add($container->get('csrf'));
    
    $app->get('/login',LoginController::class.':index');
    $app->post('/login',LoginController::class.':login');
    $app->get('/dashboard',DashboardController::class.':index');

    $app->get('/user',UserController::class.':index');

    $app->get('/user{id}',UserController::class.':detail');


$app->group('/member', function(){


 
    });