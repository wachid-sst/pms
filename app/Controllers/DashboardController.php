<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * Update 11 July 2017
 */

namespace App\Controllers;

class DashboardController extends BaseController {
    
  public function index($request, $response)
    {
        
        $this->c->view->render($response, 'dashboard.twig');
    }
    
  
}