<?php
try {
    $pdo = new PDO(
        'pgsql:host=localhost;' .
            'port=5432;' .
            'dbname=aula2;' .
            'user=postgres;' .
            'password=root'
    );
} catch (PDOException $e) {
    var_dump($e->getMessage());
}