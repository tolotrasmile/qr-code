<?php
/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 10/07/2017
 * Time: 15:40
 */

return [
    'paths' => [
        'migrations' => __DIR__ . '/db/migrations',
        'seeds' => __DIR__ . '/db/seeds'
    ],
    'environments' => [
        'default_database' => 'development',
        'development' => [
            'name' => 'qr_prime',
            'connection' => \App\Database::getInstance()->getPdo()
        ]
    ]
];
