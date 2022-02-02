<?php

$host = "mysql:host=localhost;dbname=projet_deal";
$user = "root";

$password = "";

try {
    $pdo = new PDO($host, $user, $password);
} catch (PDOExeption $e) {
    echo $e->getMessage();
}