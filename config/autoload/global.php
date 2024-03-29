<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'doctrine' => [
    'eventmanager' => [
            'orm_default' => [
                'subscribers' => [
                    // pick any listeners you need
                    'Gedmo\Timestampable\TimestampableListener',
                ],
            ],
        ],
        'connection' => [
            'orm_default' => [
                'driverClass' => Doctrine\DBAL\Driver\PDOSqlite\Driver::class,
                'params' => [
                    'path' => __DIR__ . '/../../data/db/chat.db'
                ]
            ],
        ],
    ],
];
