<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controllers;

use App\Models\User;

class UserController extends BaseController {
    
  public function index($request, $response)
    {
      
      $data = User::all();
        
        return $this->c->view->render($response, 'user/index.twig', [
            'users' => $data
        ]);
    }
    
    public function detail($request, $response){
        return $this->c->view->render($response, 'user/detail.twig');
    
    }
}