<?php
return [

    // View settings
    'view' => [
        'template_path' => __DIR__ . '/templates',
        'twig' => [
            'cache' => __DIR__ . '/../cache/twig',
            'debug' => true,
            'auto_reload' => true,
        ],
    ],

    // monolog settings
    'logger' => [
        'name' => 'app',
        'path' => __DIR__ . '/../log/app.log',
    ],

    'database'=> [
        'db_dsn'        =>'mysql:host=localhost;dbname=projectist;charset=utf8',
        'db_user'       => 'root',        //DEFAULT CHANGE AS REQUIRED
        'db_password'   => '',        //DEFAULT CHANGE AS REQUIRED
    ]
];
