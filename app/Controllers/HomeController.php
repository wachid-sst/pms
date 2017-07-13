<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * Update 11 July 2017
 */

namespace App\Controllers;
use App\Models\Home;

class HomeController Extends BaseController
{
    public function index($request, $response) {
                
        $this->data['title'] = 'Password Management System';
        $this->data['navbar_tilte'] = 'PMS APPS';
        return $this->c->view->render($response, 'home.twig', $this->data);
                
    }
    
    public function login($request, $response, $args) {
            
            return $this->c->view->render($response, 'login.twig');
 
        }
    
        public function checkLogin($email, $password) {

        $sql = 'SELECT * FROM pms_users WHERE email = :email';
        $query = $this -> conn -> prepare($sql);
        $query -> execute(array(':email' => $email));
        $data = $query -> fetchObject();
        $salt = $data -> salt;
        $db_encrypted_password = $data -> encrypted_password;

        if ($this -> verifyHash($password.$salt,$db_encrypted_password) ) {

            $user["name"] = $data -> name;
            $user["email"] = $data -> email;
            $user["unique_id"] = $data -> unique_id;
            return $user;

        } else {

            return false;
        }
 }

        public function changePassword($email, $password){

           $hash = $this -> getHash($password);
           $encrypted_password = $hash["encrypted"];
           $salt = $hash["salt"];

           $sql = 'UPDATE pms_users SET encrypted_password = :encrypted_password, salt = :salt WHERE email = :email';
           $query = $this -> conn -> prepare($sql);
           $query -> execute(array(':email' => $email, ':encrypted_password' => $encrypted_password, ':salt' => $salt));

           if ($query) {

               return true;

           } else {

               return false;

           }
        }

        public function checkUserExist($email){

           $sql = 'SELECT COUNT(*) from pms_users WHERE email =:email';
           $query = $this -> conn -> prepare($sql);
           $query -> execute(array('email' => $email));

           if($query){

               $row_count = $query -> fetchColumn();

               if ($row_count == 0){

                   return false;

               } else {

                   return true;

               }
           } else {

               return false;
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
        
            if (false === $request->getAttribute('csrf_status')) {
            
            // display suitable error here
            return "not berhasil";
            
            } else {
            
            if($request->getAttribute('has_errors')){
                
                //print_r($request->getAttribute('errors'));
                $errors = $request->getAttribute('errors');
                $this->c->flash->addMessage('errors',$errors);
                return $response->withStatus(302)->withRedirect(register);
         } 
            }
    }
    
        public function create($request, $response, $args) {
            
        
    }
}