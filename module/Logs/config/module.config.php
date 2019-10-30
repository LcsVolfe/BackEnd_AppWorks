<?php

namespace Charts;

use Charts\Service\LogService;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'doctrine' => [
        'driver' => [
            'logs_entities' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    'Logs\Entity' => 'logs_entities'
                ]
            ]
        ]
    ],
    'service_manager' => [
        'factories' => [        
            'LogService' => function ($sm) {
                return new LogService($sm->get('Doctrine\ORM\EntityManager'));
            }
        ]
    ]
];
