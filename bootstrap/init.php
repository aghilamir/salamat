<?php

include 'constant.php';
include 'config.php';
include 'vendor/autoload.php';




try {
    $pdo = new PDO("mysql:dbname=$database_config->db;host={$database_config->host}", $database_config->user, $database_config->pass);
} catch (PDOException $e) {
    echo 'conection faild'.$e->getMessage();
    die();
}


include 'libs/lib-products.php';
include 'libs/lib-carts.php';
include 'libs/lib-checkout.php';
include 'libs/helpers.php';

