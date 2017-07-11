<?php

/* 
 * Abdur Rochman Wachid <wachid.web.id>
 * Update 11 July 2017
 */

require __DIR__ .'/../vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__, '../.env');
$dotenv->load();

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

