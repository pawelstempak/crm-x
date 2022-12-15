<?php

return [
    'connections' => [
        'mysql'   => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'crm-x-test',
            'username'  => 'user',
            'password'  => '',
            'charset'   => 'latin1',
            'collation' => 'latin1_swedish_ci',
            'prefix'    => '',
            'strict'    => false,
        ],
        'mysql-utf8'   => [
            'driver'    => 'mysql',
            'host'      => 'localhost',
            'database'  => 'crm-x-test',
            'username'  => 'user',
            'password'  => '',
            'charset'   => 'latin1',
            'collation' => 'latin1_swedish_ci',
            'prefix'    => '',
            'strict'    => false,
        ],
    ],
    'log'         => [
        'log_queries'       => false,
        'log_slow_queries'  => false,
        'slow_queries_time' => 500,
        'directory' => storage_path() . '/logs/' . getenv('APP_ENV')
            . '/sql',
    ],

    /* Use it only if your main connection is other than UTF-8 
    'utf8_connection' => 'mysql-utf8',
    */
];
