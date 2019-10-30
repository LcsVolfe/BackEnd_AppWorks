<?php
return [
    'zf-mvc-auth' => [
        'authentication' => [
            'adapters' => [
                'oauth_adapter' => [
                    'adapter' => \ZF\MvcAuth\Authentication\OAuth2Adapter::class,
                    'storage' => [
                        'adapter' => \pdo::class,
                        'dsn' => 'mysql:host=localhost;port=3306;dbname=app_works',
                        'route' => '/oauth',
                        'username' => 'root',
                        'password' => '_2T9.kktrfzl1',
                    ],
                ],
            ],
            'map' => [
                'AdminAPI\\V1' => 'oauth_adapter'
            ]
        ],
    ],
    'zf-oauth2' => [
        'allow_implicit' => true,
    ],
    'db' => [
        'adapters' => [
            'oauth_adapter' => [
                'database' => 'app_works',
                'driver' => 'PDO_Mysql',
                'hostname' => 'localhost',
                'username' => 'root',
                'password' => '_2T9.kktrfzl1',
                'port' => '3306',
            ]
        ]
    ]
];
