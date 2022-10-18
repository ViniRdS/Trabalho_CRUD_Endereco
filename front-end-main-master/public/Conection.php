<?php
try {
    $pdo = new PDO(
        'pgsql:host=127.0.0.1;' .
            'port=5432;' .
            'dbname=aula2;' .
            'user=postgres;' .
            'password=root'
    );
} catch (PDOException $e) {
    var_dump($e->getMessage());
}