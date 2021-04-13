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
/*$users = [
    [
        'name' => 'Miguel Perez',
        'email' => 'miguel.perez@segic.cl',
        'username' => 'miguel.perez',
        'password' => 'miguel123'
    ],
    [
        'name' => 'Andrea Perez',
        'email' => 'andrea.perez@segic.cl',
        'username' => 'andrea.perez',
        'password' => 'andrea123'
    ],
];

$sql = "INSERT INTO users 
            (full_name, email, user_name, password)
        VALUES
            (:full_name, :email, :user_name, :password)";

//statement
$stmt = $db->prepare($sql);

foreach ($users as $user) {
    $stmt->bindParam(':full_name', $user['name']);
    $stmt->bindParam(':email', $user['email']);
    $stmt->bindParam(':user_name', $user['username']);
    $stmt->bindParam(':password', password_hash($user['password'], PASSWORD_DEFAULT));

    $stmt->execute();
}*/

// delete
/*$id = 2;
$stmt = $db->prepare("DELETE FROM users WHERE id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();
*/

// querying data
$stmt = $db->prepare("SELECT * FROM users");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    echo $user['id'];
    echo $user['full_name'];
}
