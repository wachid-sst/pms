<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controllers;

use App\Models\User;
use App\Models\Home;
use App\Models\Pms_User;
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
        
        $email = $request->getParsedBody()['email'];
        $password = $request->getParsedBody()['password'];
        
        
        $kons = Home::whereEmail($email)->first();
        $salt = $kons->salt;
        $db_encrypted_password = $kons->encrypted_password;
        
        //return $response->withJson($user);
        
        if ($this -> verifyHash($password.$salt,$db_encrypted_password) ) {
            
            $token = [
                "iss" => "wachid.sst",
                "iat" => time(),
                "exp" => time()+60*60,
                "data"=> [
                    "name" => $user->name,
                    "email" =>$user->email,
                    "unique_id" =>$user->unique_id
                ]
            
        ];
        
        $jwt = JWT::encode($token, getenv('KEY_JWT'));
        
        return $response->withJson([
           
            'success' => true,
            'message' => 'login success',
            'jwt'     => $jwt
        ]);
        
        } else {
    
         return $response->withJson([
                'success' => false,
                'msessage' => "password atau email salah"
            ]);
        }              
    }


    public function detail($request, $response){
        return $this->c->view->render($response, 'user/detail.twig');
    
    }
    
    public function register($request, $response, $args) {
        
          
        $name= $request->getParsedBody()['name'];
        $email = $request->getParsedBody()['email'];
        $password = $request->getParsedBody()['password'];
        
    
   if (!empty($name) && !empty($email) && !empty($password)) {

      if ($this->checkUserExist($email)) {

            return $response->withJson([
                'success' => false,
                'msessage' => 'User Already Registered'
            ]);

      } else {

         $result = $this->insertData($name, $email, $password);

         if ($result) {

            return $response->withJson([
                'success' => true,
                'result' => 'success',
                'msessage' => 'User Registered Successfully !'
            ]);

         } else {
            
                return $response->withJson([
                    'success' => false,
                    'result' => 'failure',
                    'msessage' => 'Registration Failure !'
                ]);

         }
      }
   } else {
  
                return $response->withJson([
                    'success' => false,
                    'result' => 'failure',
                    'msessage' => 'Empty Post !'
                ]);

   }
}
     
    public function changePassword($email, $password){

        $hash = $this -> getHash($password);
        $encrypted_password = $hash["encrypted"];
        $salt = $hash["salt"];

        $sql = 'UPDATE users SET encrypted_password = :encrypted_password, salt = :salt WHERE email = :email';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':email' => $email, ':encrypted_password' => $encrypted_password, ':salt' => $salt));

        if ($query) {

            return true;

        } else {

            return false;

        }
    }

    public function checkUserExist($email){

        $user = Home::where('email', $email);
    
    
            if (!$user){

                return false;

            } else {
                return true;
        }    
    }

    public function getHash($password) {

        $salt = sha1(rand());
        $salt = substr($salt, 0, 10);
        $encrypted = password_hash($password.$salt, PASSWORD_DEFAULT);
        $hash = array("salt" => $salt, "encrypted" => $encrypted);

        return $hash;

    }
     
        public function verifyHash($password, $hash) {

            return password_verify ($password, $hash);
        }
    
        public function insertData($name,$email,$password){

        $unique_id = uniqid('', true);
        $hash = $this->getHash($password);
        $encrypted_password = $hash["encrypted"];
        $salt = $hash["salt"];

        // Save mesin data
            $reg = Home::create([
                'unique_id' => $unique_id,
                'name' => $name,
                'email' => $email,
                'encrypted_password' => $encrypted_password,
                'salt' => $salt
                    
            ]);

        if ($reg) {
            return true;

        } else {

            return false;
            
        }
    }
}