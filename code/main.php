<?php

session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location: index.php");
}

require "util/db.php";
$db = connectDB();

$sql = "SELECT * FROM users";

//statement
$stmt = $db->prepare($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
</head>
<body>
    <?= "Hola, " . $_SESSION['nombre']; ?>
    <a href="logout.php">(Salir)</a>

    <h1>Lista de Usuarios Disponibles</h1>

    <table border="1">
        <tr>
            <th>Full Name</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
    </table>
</body>
</html>