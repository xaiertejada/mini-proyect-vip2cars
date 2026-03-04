<?php

const ENVIRONMENT = 'staging';

$CONFIG = array(
    'master' => [
        'url' => '',
        'database' => [
            'hostname' => '',
            'database' => '',
            'username' => '',
            'password' => '',
            'port' => '3306',
        ],

    ],
    'staging' => [
        'url' => '',
        'database' => [
            'hostname' => '',
            'database' => '',
            'username' => '',
            'password' => '',
            'port' => '3306',
        ],
    ],
    'dev' => [
        'url' => 'http://vip2cars.local/',
        'database' => [
            'hostname' => 'localhost',
            'database' => 'vip2cars',
            'username' => 'root',
            'password' => '',
            'port' => '3306',
        ],
    ],

);
define("CONFIG", $CONFIG);
