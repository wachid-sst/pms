<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$container = $app->getContainer();

//Container untuk view

$container['view'] = function ($container){
    $view = new \Slim\Views\Twig(__DIR__.'/../resources/views',[
      'cache' => false  
   
]);
    
    // Instantiate and add Slim specific extension
    $basePath = rtrim(str_ireplace('index.php', '', $container['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($container['router'], $basePath));

    return $view;
};

