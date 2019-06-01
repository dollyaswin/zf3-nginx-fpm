<?php
return [
    'doctrine' => [
        'driver' => [
            'chat_entity' => [
                'class' => 'Doctrine\ORM\Mapping\Driver\YamlDriver',
                'cache' => 'array',
                'paths' => [__DIR__ . '/orm']
            ],
            'orm_default' => [
                'drivers' => [
                    'Chat\Entity' => 'chat_entity',
                ]
            ]
        ],
    ],
];
