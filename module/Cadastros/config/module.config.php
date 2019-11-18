<?php

namespace Cadastros;


use Cadastros\Service\UsuarioService;
use Cadastros\Service\CheckUserNameService;
use Cadastros\Service\CheckEmailService;
use Cadastros\Service\IdentityService;
use Cadastros\Service\AnuncioService;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'doctrine' => [
        'driver' => [
            'cadastros_entities' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/../src/Entity']
            ],
            'orm_default' => [
                'drivers' => [
                    'Cadastros\Entity' => 'cadastros_entities'
                ]
            ]
        ]
    ],
    'service_manager' => [
        'factories' => [  
            'UsuarioService' => function ($sm) {
                return new UsuarioService($sm->get('Doctrine\ORM\EntityManager'));
            },
            'CheckUserNameService' => function ($sm) {
                return new CheckUserNameService($sm->get('Doctrine\ORM\EntityManager'));
            },            
            'CheckEmailService' => function ($sm) {
                return new CheckEmailService($sm->get('Doctrine\ORM\EntityManager'));
            },
            'IdentityService' => function ($sm) {
                return new IdentityService($sm->get('Doctrine\ORM\EntityManager'));
            },
            'AnuncioService' => function ($sm) {
                return new AnuncioService($sm->get('Doctrine\ORM\EntityManager'));
            }
        ]
    ]
];
