<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * Update 11 July 2017
 */

namespace App\Helper;

use DavidePastore\Slim\Validation\Validation;

use Respect\Validation\Validator as v;

class ValidationHelper {
    
    public static function validate($fn_name) {
        
        return new Validation (call_user_func([new ValidationHelper(), $fn_name]));
        
    }
    
    public function register_user() {
        
        return [
            
            'email' => v::email(),
            'password' => v::alnum()->noWhitespace()->length(5,10)
                    
        ];
    }
}
