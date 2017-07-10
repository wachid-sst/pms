<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.  
 */

namespace App\Helper;

class CsrfExtention extends \Twig_Extension {
    
    protected $csrf;
    
    public function __construct(\Slim\Csrf\Guard $csrf){
        $this->csrf = $csrf;
    }

    public function getFunctions() {

     return[
         new \Twig_SimpleFunction('csrf_field', array($this, 'generateCsrf')),
         
     ];
}

public function generateCsrf(){
    
        $nameKey  = $this->csrf->getTokenNameKey();
        $name     = $this->csrf->getTokenName();   
        $valueKey = $this->csrf->getTokenValueKey();
        $value    = $this->csrf->getTokenValue();   
    
    return '
    <input type="hidden" name="'.$nameKey.'" value="'. $name .'">
    <input type="hidden" name="'.$valueKey.'" value="'.$value .'">
    ';
    
    }
}