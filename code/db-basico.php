<?php

$dbname = "registro2222222";
$dbuser = "registro-user";
$dbpassword = "registro-user";

try {
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $db = new PDO($dsn, $dbuser, $dbpassword);
} catch (PDOException $e) {
    echo $e->getMessage();
}
