<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * 10 July 2017
 */

namespace App\Controllers;

use App\Models\Mesin;
use \Firebase\JWT\JWT;


class MesinController extends BaseController {
    public function index($request, $response) {
        return $response->withJson(Mesin::all());
        
    }
    
    private $key = "jangandihafalsusahsekali";
    
    public function store($request, $response) {
        
        $jwt = $request->getHeader('Authorization')[0]; 
        
        try {
            
            $decoded = JWT::decode($jwt, $this->key, array('HS256'));
            
            //return $response->withJson($decoded);
            
            $mesin = Mesin::create([
                
                'mesin_name' => $request->getParsedBody()['mesin_name'],
                'mesin_ip' => $request->getParsedBody()['mesin_ip']
                    
            ]);
            
            return $response->withJson([
           
            'success' => true,
            'message' => 'data mesin berhasil disimpan',
            'data'     => $mesin
        ]);
            
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
            }
        }
    
    public function show($request, $response, $arg) {
        $mesin = Mesin::find($arg['id']);
        return $response->withJson($mesin);
    }
}
