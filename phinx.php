<?php
/**
 * Created by IntelliJ IDEA.
 * User: Euranto
 * Date: 10/07/2017
 * Time: 15:40
 */

$pdo = new PDO('mysql:host=127.0.0.1;dbname=qr_prime;port=3306', 'root', '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);

return [
    'paths' => [
        'migrations' => __DIR__ . '/db/migrations',
        'seeds' => __DIR__ . '/db/seeds'
    ],
    'environments' => [
        'default_database' => 'development',
        'development' => [
            'name' => 'qr_prime',
            'connection' => $pdo
        ]
    ]
];
