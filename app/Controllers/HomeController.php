<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * Update 11 July 2017
 */

namespace App\Controllers;

class HomeController Extends BaseController
{
    public function index($request, $response) {
        
        return $this->c->view->render($response, 'home.twig');
                
    }
    
    public function login($request, $response, $args) {
            
        return $this->c->view->render($response, 'login.twig');
    
    }
    
    public function login_action($request, $response, $args) {
        
        if (false === $request->getAttribute('csrf_status')) {
            
            // display suitable error here
            return "not berhasil";
            } else {
                
            // successfully passed CSRF check
    
                $this->c->flash->addMessage('info','anda berhasil login');
                
                return $response->withStatus(302)->withHeader('Location','/password/public/ ');
        }
        
    }
    
        public function register($request, $response, $args) {
            $errors = $this->c->flash->getMessage('errors')[0];
            if ($errors){
                
                print_r($errors);
            }
            return $this->c->view->render($response, 'register.twig');
    
    }
    
        public function register_action($request, $response, $args) {
        
            if($request->getAttribute('has_errors')){
                
                //print_r($request->getAttribute('errors'));
                $errors = $request->getAttribute('errors');
                $this->c->flash->addMessage('errors',$errors);
                return $response->withStatus(302)->withRedirect(register);
         } 
        
    }
    
        public function create($request, $response, $args) {
            
        
    }
}