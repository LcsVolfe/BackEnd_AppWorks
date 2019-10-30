<?php
return [
    'service_manager' => [
        'factories' => [
            \AdminAPI\V1\Rest\Teste\TesteResource::class => \AdminAPI\V1\Rest\Teste\TesteResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'admin-api.rest.teste' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/teste[/:teste_id]',
                    'defaults' => [
                        'controller' => 'AdminAPI\\V1\\Rest\\Teste\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'admin-api.rest.teste',
        ],
    ],
    'zf-rest' => [
        'AdminAPI\\V1\\Rest\\Teste\\Controller' => [
            'listener' => \AdminAPI\V1\Rest\Teste\TesteResource::class,
            'route_name' => 'admin-api.rest.teste',
            'route_identifier_name' => 'teste_id',
            'collection_name' => 'teste',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \AdminAPI\V1\Rest\Teste\TesteEntity::class,
            'collection_class' => \AdminAPI\V1\Rest\Teste\TesteCollection::class,
            'service_name' => 'Teste',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'AdminAPI\\V1\\Rest\\Teste\\Controller' => 'Json',
        ],
        'accept_whitelist' => [
            'AdminAPI\\V1\\Rest\\Teste\\Controller' => [
                0 => 'application/vnd.admin-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'AdminAPI\\V1\\Rest\\Teste\\Controller' => [
                0 => 'application/vnd.admin-api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \AdminAPI\V1\Rest\Teste\TesteEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'admin-api.rest.teste',
                'route_identifier_name' => 'teste_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \AdminAPI\V1\Rest\Teste\TesteCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'admin-api.rest.teste',
                'route_identifier_name' => 'teste_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'AdminAPI\\V1\\Rest\\Teste\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
];
