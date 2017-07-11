<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * Update 11 July 2017
 */

// For system routing

use App\Helper\ValidationHelper;
$vh = new ValidationHelper();

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
                ->add($vh::validate('register_user')); 

    $app->get('/user',UserController::class.':index');
    $app->get('/user{id}',UserController::class.':detail');


$app->group('/member', function(){


 
    });