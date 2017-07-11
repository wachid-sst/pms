<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * Update 11 July 2017
 */

use Respect\Validation\Validator as v;

$email_rules= v::email();
$password_rules = v::alnum()->noWhitespace()->length(5,10);

$register_validator = [
    'email'    => $email_rules,
    'password' => $password_rules
];