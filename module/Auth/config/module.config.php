<?php
namespace Auth;

//use xxxxx\Service\xService;

return [
    'doctrine' => [
        'driver' => [
            'auth_entities' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    'Auth\Entity' => 'auth_entities'
                ]
            ]
        ]
    ],
    /*'service_manager' => [
        'factories' => [      
            'xService' => function ($sm) {
                return new xService($sm->get('Doctrine\ORM\EntityManager'));
            }
        ]
    ]*/
];
