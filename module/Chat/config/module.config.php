<?php
return [
    'service_manager' => [
        'factories' => [
            'Chat\\V1\\Rest\\Chat\\ChatResource' => 'Chat\\V1\\Rest\\Chat\\ChatResourceFactory',
            \Chat\Mapper\Chat::class => \Chat\Mapper\ChatFactory::class,
            \Chat\V1\Service\Chat::class => \Chat\V1\Service\ChatFactory::class,
            //\Chat\V1\Service\Chat::class => 'Chat\\V1\\Service\\ChatFactory',
        ],
    ],
    'hydrators' => [
        'factories' => [
            'Chat\\Hydrator\\Chat' => \Chat\Hydrator\ChatFactory::class
        ]
    ],
    'router' => [
        'routes' => [
            'chat.rest.chat' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/chat[/:uuid]',
                    'defaults' => [
                        'controller' => 'Chat\\V1\\Rest\\Chat\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'chat.rest.chat',
        ],
    ],
    'zf-rest' => [
        'Chat\\V1\\Rest\\Chat\\Controller' => [
            'listener' => 'Chat\\V1\\Rest\\Chat\\ChatResource',
            'route_name' => 'chat.rest.chat',
            'route_identifier_name' => 'uuid',
            'collection_name' => 'chat',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => '10',
            'page_size_param' => null,
            'entity_class' => 'Chat\\Entity\\Chat',
            'collection_class' => 'Chat\\V1\\Rest\\Chat\\ChatCollection',
            'service_name' => 'Chat',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Chat\\V1\\Rest\\Chat\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Chat\\V1\\Rest\\Chat\\Controller' => [
                0 => 'application/vnd.chat.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Chat\\V1\\Rest\\Chat\\Controller' => [
                0 => 'application/vnd.chat.v1+json',
                1 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            'Chat\\V1\\Rest\\Chat\\ChatCollection' => [
                'entity_identifier_name' => 'id',
                'route_name' => 'chat.rest.chat',
                'route_identifier_name' => 'chat_id',
                'is_collection' => true,
            ],
            'Chat\\Entity\\Chat' => [
                'entity_identifier_name' => 'uuid',
                'route_name' => 'chat.rest.chat',
                'route_identifier_name' => 'uuid',
            'hydrator' => 'Chat\Hydrator\Chat'
            ],
        ],
    ],
    'zf-content-validation' => [
        'Chat\\V1\\Rest\\Chat\\Controller' => [
            'input_filter' => 'Chat\\V1\\Rest\\Chat\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Chat\\V1\\Rest\\Chat\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [
                    0 => [
                        'name' => 'Zend\\Validator\\NotEmpty',
                        'options' => [],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => 'Zend\\Filter\\StripTags',
                        'options' => [],
                    ],
                ],
                'name' => 'message',
                'description' => 'text message',
                'field_type' => 'text',
                'error_message' => 'Message not valid',
            ],
        ],
    ],
];
