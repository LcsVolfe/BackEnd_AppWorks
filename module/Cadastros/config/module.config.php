<?php

namespace Cadastros;

use Cadastros\Service\ContabilidadeService;
use Cadastros\Service\EmpresaService;
use Cadastros\Service\UsuarioService;
use Cadastros\Service\TreinamentoService;
use Cadastros\Service\PlanoService;
use Cadastros\Service\CheckUserNameService;
use Cadastros\Service\CheckEmailService;
use Cadastros\Service\IdentityService;
use Cadastros\Service\LogService;

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
            'ContabilidadeService' => function ($sm) {
                return new ContabilidadeService($sm->get('Doctrine\ORM\EntityManager'));
            },
            'EmpresaService' => function ($sm) {
                return new EmpresaService($sm->get('Doctrine\ORM\EntityManager'));
            },
            'UsuarioService' => function ($sm) {
                return new UsuarioService($sm->get('Doctrine\ORM\EntityManager'));
            },
            'TreinamentoService' => function ($sm) {
                return new TreinamentoService($sm->get('Doctrine\ORM\EntityManager'));
            },
            'PlanoService' => function ($sm) {
                return new PlanoService($sm->get('Doctrine\ORM\EntityManager'));
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
            'LogService' => function ($sm) {
                return new LogService($sm->get('Doctrine\ORM\EntityManager'));
            }
        ]
    ]
];
