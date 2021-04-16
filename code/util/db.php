<?php

function connectDB()
{
    $dbname = "registro";
    $dbuser = "registro-user";
    $dbpassword = "registro-user";

    try {
        $dsn = "mysql:host=localhost;dbname=$dbname";
        return new PDO($dsn, $dbuser, $dbpassword);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}