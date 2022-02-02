<?php

$host = "mysql:host=localhost;dbname=projet_deal";
$user = "root";
$password = ""; //sur windows. Pour Mac la value doit etre "root";


try {
    $pdo = new PDO($host, $user, $password);
} catch (PDOExeption $err) {
    echo $err->getMessage();
}

?>


