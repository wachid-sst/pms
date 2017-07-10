<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * 10 July 2017
 */

namespace App\Controllers;

use App\Models\Mesin;

class MesinController extends BaseController {
    public function index($request, $response) {
        return $response->withJson(Mesin::all());
        
    }
    
    public function show($request, $response, $arg) {
        $mesin = Mesin::find($arg['id']);
        return $response->withJson($mesin);
    }
}
