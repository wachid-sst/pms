<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controllers;

use App\Models\User;
use \Firebase\JWT\JWT;

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
            return $response->withJson([
                'success' => false,
                'msessage' => 'user atau pass salah'
            ]);
        }
    
        $token = [
            "iss" => "wachid.sst",
            "iat" => time(),
            "exp" => time()+60*60,
            "data"=> [
                "user_id" => $user->id,
                "u_name" =>$user->user_name,
                "u_password" =>$user->user_password
            ]
            
        ];
        
        $jwt = JWT::encode($token, getenv('KEY_JWT'));
        
        return $response->withJson([
           
            'success' => true,
            'message' => 'login success',
            'jwt'     => $jwt
        ]);
                 
    }


    public function detail($request, $response){
        return $this->c->view->render($response, 'user/detail.twig');
    
    }
    
    
}