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
    
    private $key = "jangandihafalsusahsekali";
    
    public function store($request, $response) {
            // Save mesin data
            $mesin = Mesin::create([
                
                'mesin_name' => $request->getParsedBody()['mesin_name'],
                'mesin_ip' => $request->getParsedBody()['mesin_ip']
                    
            ]);
            
            return $response->withJson([
           
            'success' => true,
            'message' => 'data mesin berhasil disimpan',
            'data'     => $mesin
        ]);
            
        
        }
    
    public function show($request, $response, $arg) {
        $mesin = Mesin::find($arg['id']);
        return $response->withJson($mesin);
    }
}
