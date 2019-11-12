<?php
return [
    'service_manager' => [
        'factories' => [
            \CadastrosAPI\V1\Rest\Usuario\UsuarioResource::class => \CadastrosAPI\V1\Rest\Usuario\UsuarioResourceFactory::class,
            \CadastrosAPI\V1\Rest\Prestador\PrestadorResource::class => \CadastrosAPI\V1\Rest\Prestador\PrestadorResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'cadastros-api.rest.usuario' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/usuario[/:usuario_id]',
                    'defaults' => [
                        'controller' => 'CadastrosAPI\\V1\\Rest\\Usuario\\Controller',
                    ],
                ],
            ],
            'cadastros-api.rest.prestador' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/prestador[/:prestador_id]',
                    'defaults' => [
                        'controller' => 'CadastrosAPI\\V1\\Rest\\Prestador\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'cadastros-api.rest.usuario',
            1 => 'cadastros-api.rest.prestador',
        ],
    ],
    'zf-rest' => [
        'CadastrosAPI\\V1\\Rest\\Usuario\\Controller' => [
            'listener' => \CadastrosAPI\V1\Rest\Usuario\UsuarioResource::class,
            'route_name' => 'cadastros-api.rest.usuario',
            'route_identifier_name' => 'usuario_id',
            'collection_name' => 'usuario',
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
            'entity_class' => \CadastrosAPI\V1\Rest\Usuario\UsuarioEntity::class,
            'collection_class' => \CadastrosAPI\V1\Rest\Usuario\UsuarioCollection::class,
            'service_name' => 'Usuario',
        ],
        'CadastrosAPI\\V1\\Rest\\Prestador\\Controller' => [
            'listener' => \CadastrosAPI\V1\Rest\Prestador\PrestadorResource::class,
            'route_name' => 'cadastros-api.rest.prestador',
            'route_identifier_name' => 'prestador_id',
            'collection_name' => 'prestador',
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
            'entity_class' => \CadastrosAPI\V1\Rest\Prestador\PrestadorEntity::class,
            'collection_class' => \CadastrosAPI\V1\Rest\Prestador\PrestadorCollection::class,
            'service_name' => 'Prestador',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'CadastrosAPI\\V1\\Rest\\Usuario\\Controller' => 'Json',
            'CadastrosAPI\\V1\\Rest\\Prestador\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'CadastrosAPI\\V1\\Rest\\Usuario\\Controller' => [
                0 => 'application/vnd.cadastros-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'CadastrosAPI\\V1\\Rest\\Prestador\\Controller' => [
                0 => 'application/vnd.cadastros-api.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'CadastrosAPI\\V1\\Rest\\Usuario\\Controller' => [
                0 => 'application/vnd.cadastros-api.v1+json',
                1 => 'application/json',
            ],
            'CadastrosAPI\\V1\\Rest\\Prestador\\Controller' => [
                0 => 'application/vnd.cadastros-api.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \CadastrosAPI\V1\Rest\Usuario\UsuarioEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'cadastros-api.rest.usuario',
                'route_identifier_name' => 'usuario_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \CadastrosAPI\V1\Rest\Usuario\UsuarioCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'cadastros-api.rest.usuario',
                'route_identifier_name' => 'usuario_id',
                'is_collection' => true,
            ],
            \CadastrosAPI\V1\Rest\Prestador\PrestadorEntity::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'cadastros-api.rest.prestador',
                'route_identifier_name' => 'prestador_id',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \CadastrosAPI\V1\Rest\Prestador\PrestadorCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'cadastros-api.rest.prestador',
                'route_identifier_name' => 'prestador_id',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-content-validation' => [
        'CadastrosAPI\\V1\\Rest\\Usuario\\Controller' => [
            'input_filter' => 'CadastrosAPI\\V1\\Rest\\Usuario\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'CadastrosAPI\\V1\\Rest\\Usuario\\Validator' => [
            0 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'id',
                'field_type' => 'integer',
            ],
            1 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'username',
                'field_type' => 'string',
            ],
            2 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'password',
                'field_type' => 'string',
            ],
            3 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'nome',
                'field_type' => 'string',
            ],
            4 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'email',
                'field_type' => 'string',
            ],
            5 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'cpf',
                'field_type' => 'integer',
            ],
            6 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'telefone',
                'field_type' => 'integer',
            ],
            7 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'cep',
                'field_type' => 'integer',
            ],
            8 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'cidade',
                'field_type' => 'string',
            ],
            9 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'estado',
                'field_type' => 'string',
            ],
            10 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'bairro',
                'field_type' => 'string',
            ],
            11 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'rua',
                'field_type' => 'string',
            ],
            12 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'complemento',
                'field_type' => 'string',
            ],
            13 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'foto',
                'field_type' => 'string',
            ],
            14 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'role',
                'field_type' => 'integer',
            ],
            15 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'pagamento',
                'field_type' => 'integer',
            ],
            16 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'servico',
                'field_type' => 'integer',
            ],
            17 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'razao_social',
                'field_type' => 'string',
                'allow_empty' => true,
            ],
            18 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'nome_fantasia',
                'field_type' => 'string',
            ],
            19 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'experiencias',
                'field_type' => 'string',
            ],
            20 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'descricao',
                'field_type' => 'string',
            ],
            21 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'data_nascimento',
                'field_type' => \datetime::class,
            ],
        ],
    ],
];
