<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

class LoginController Extends BaseController
{
    public function index($request, $response) {
        
        return $this->c->view->render($response, 'login.twig');
                
    }
    
    public function login($request, $response, $args) {
        
        if (false === $request->getAttribute('csrf_status')) {
            
            // display suitable error here
            return "not berhasil";
            } else {
                
            // successfully passed CSRF check
    
                $this->c->flash->addMessage('info','anda berhasil login');
                
                return $response->withStatus(302)->withHeader('Location','/password/public/dashboard ');
        }
        
    }
}