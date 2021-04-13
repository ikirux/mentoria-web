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

// Insert Masivo
$users = [
    ['Miguel Perez', 'miguel.perez@segic.cl', 'miguel.perez', 'miguel123'],
    ['Andrea Perez', 'andrea.perez@segic.cl', 'andrea.perez', 'andrea123'],
];

$sql = "INSERT INTO users 
            (full_name, email, user_name, password)
        VALUES
            (:full_name, :email, :user_name, :password)";

//statement
$stmt = $db->prepare($sql);

foreach ($users as $user) {
    $full_name = $user[0];
    $email = $user[1];
    $user_name = $user[2];
    $password = password_hash($user[3], PASSWORD_DEFAULT);

    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':user_name', $user_name);
    $stmt->bindParam(':password', $password);

    $stmt->execute();
}









// delete
/*$id = 2;
$stmt = $db->prepare("DELETE FROM users WHERE id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
*/