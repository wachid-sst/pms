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
        
        //Update mesin data
        public function update($request, $response, $args) {
            // Save mesin data
            $mesin = Mesin::find($args['id'])->update([
                
                'mesin_name' => $request->getParsedBody()['mesin_name'],
                'mesin_ip' => $request->getParsedBody()['mesin_ip']
                    
            ]);
            
            return $response->withJson([
           
            'success' => true,
            'message' => 'data mesin berhasil di update',
            'data'     => $mesin
        ]);
                
        }
        
                //Update mesin data
        public function delete($request, $response, $args) {
            // Save mesin data
            $mesin = Mesin::find($args['id'])->delete();
            
            return $response->withJson([
           
            'success' => true,
            'message' => 'data mesin berhasil di delete',
            'data'     => $mesin
        ]);
                
        }
        
        
    public function show($request, $response, $arg) {
        $mesin = Mesin::find($arg['id']);
        return $response->withJson($mesin);
    }
}
