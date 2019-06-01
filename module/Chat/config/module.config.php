<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Chat\\V1\\Rest\\Chat\\ChatResource' => 'Chat\\V1\\Rest\\Chat\\ChatResourceFactory',
        ),
    ),
    'router' => array(
        'routes' => array(
            'chat.rest.chat' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api/chat[/:uuid]',
                    'defaults' => array(
                        'controller' => 'Chat\\V1\\Rest\\Chat\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'chat.rest.chat',
        ),
    ),
    'zf-rest' => array(
        'Chat\\V1\\Rest\\Chat\\Controller' => array(
            'listener' => 'Chat\\V1\\Rest\\Chat\\ChatResource',
            'route_name' => 'chat.rest.chat',
            'route_identifier_name' => 'uuid',
            'collection_name' => 'chat',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => '10',
            'page_size_param' => null,
            'entity_class' => 'Chat\\Entity\\Chat',
            'collection_class' => 'Chat\\V1\\Rest\\Chat\\ChatCollection',
            'service_name' => 'Chat',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Chat\\V1\\Rest\\Chat\\Controller' => 'HalJson',
        ),
        'accept_whitelist' => array(
            'Chat\\V1\\Rest\\Chat\\Controller' => array(
                0 => 'application/vnd.chat.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Chat\\V1\\Rest\\Chat\\Controller' => array(
                0 => 'application/vnd.chat.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Chat\\V1\\Rest\\Chat\\ChatEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'chat.rest.chat',
                'route_identifier_name' => 'chat_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Chat\\V1\\Rest\\Chat\\ChatCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'chat.rest.chat',
                'route_identifier_name' => 'chat_id',
                'is_collection' => true,
            ),
            'Chat\\Entity\\Chat' => array(
                'entity_identifier_name' => 'uuid',
                'route_name' => 'chat.rest.chat',
                'route_identifier_name' => 'uuid',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Chat\\V1\\Rest\\Chat\\Controller' => array(
            'input_filter' => 'Chat\\V1\\Rest\\Chat\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Chat\\V1\\Rest\\Chat\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(
                    0 => array(
                        'name' => 'Zend\\Validator\\NotEmpty',
                        'options' => array(),
                    ),
                ),
                'filters' => array(
                    0 => array(
                        'name' => 'Zend\\Filter\\StripTags',
                        'options' => array(),
                    ),
                ),
                'name' => 'message',
                'description' => 'text message',
                'field_type' => 'text',
                'error_message' => 'Message not valid',
            ),
        ),
    ),
);
