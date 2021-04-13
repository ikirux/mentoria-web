<?php

$dbname = "registro";
$dbuser = "registro-user";
$dbpassword = "registro-user";

try {
    $dsn = "mysql:host=localhost;dbname=$dbname";
    $db = new PDO($dsn, $dbuser, $dbpassword);
} catch (PDOException $e) {
    echo $e->getMessage();
}

// Insert
/*
$sql = "INSERT INTO users 
            (full_name, email, user_name, password)
        VALUES
            (:full_name, :email, :user_name, :password)";

//statement
$stmt = $db->prepare($sql);

$full_name = 'Juan Perez';
$email = "juan.perez@segic.cl";
$user_name = 'juan.perez';
$password = 'juan123';

$stmt->bindParam(':full_name', $full_name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':user_name', $user_name);
$stmt->bindParam(':password', $password);

$stmt->execute(); */

// delete
$id = 2;
$stmt = $db->prepare("DELETE FROM users WHERE id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
