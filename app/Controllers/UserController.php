<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controllers;

use Interop\Container\ContainerInterface;

class UserController {
    
    protected $kontainer;
    
    public function __construct(ContainerInterface $container) {
        $this->kontainer = $container;
    }
    
    public function index($request, $response){
        return $this->kontainer ->view->render($response, 'user.twig');
    }
    
        public function detail(){
        echo "this controller user detail";
    }
}