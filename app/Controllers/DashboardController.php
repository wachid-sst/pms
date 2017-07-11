<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace App\Controllers;

class DashboardController extends BaseController {
    
  public function index($request, $response)
    {
        $message = $this->c->flash->getMessage('info');
        
        $this->c->view->render($response, 'dashboard.twig',[
           
            'msg' => $message[0]
        ]);
    }
    
  
}