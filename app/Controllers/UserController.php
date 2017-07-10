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
    
    public function login($request, $response) {
        
        $username = $request->getParsedBody('user_ name');
        $password = $request->getParsedBody('user_password');
        
        $user = User::where('user_name',$username)->where('user_password', $password)->first();
    
        if(empty($user)){
            die('kosong');
        }
        
        return $response->WithJson($user);
    }


    public function detail($request, $response){
        return $this->c->view->render($response, 'user/detail.twig');
    
    }
}