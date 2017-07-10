<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require __DIR__ .'/../vendor/autoload.php';

$app = new Slim\App([
    'settings' => [
        'displayErrorDetails'=> true,
        'db' => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'pms_apps',
            'username'  => 'iniuser',
            'password'  => 'ini@password',
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]
    ]
]);

