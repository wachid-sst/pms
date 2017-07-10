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
}