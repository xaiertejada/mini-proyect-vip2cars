<?php

require_once __DIR__ . '/Config/config.php';

$env = ENVIRONMENT;
$db  = CONFIG[$env]['database'];

return [
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/database/migrations',
        'seeds'      => '%%PHINX_CONFIG_DIR%%/database/seeds',
    ],

    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment'     => $env,

        $env => [
            'adapter' => 'mysql',
            'host'    => $db['hostname'],
            'name'    => $db['database'],
            'user'    => $db['username'],
            'pass'    => $db['password'],
            'port'    => $db['port'],
            'charset' => 'utf8mb4',
        ],
    ],

    'version_order' => 'creation'
];