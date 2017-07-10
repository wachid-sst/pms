<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Controllers;

class LoginController Extends BaseController
{
    public function index($request, $response){
        
        $nameKey  = $this->c->csrf->getTokenNameKey();
        $name     = $request->getAttribute($nameKey);
        $valueKey = $this->c->csrf->getTokenValueKey();
        $value    = $request->getAttribute($valueKey);        
        
        return $this ->c->view->render($response, 'login.twig',[
            'nameKey'   => $nameKey,        
            'name'      => $name,
            'valueKey'  => $valueKey,
            'value'     => $value,
        ]
                );
    }
}