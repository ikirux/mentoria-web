<?php

$id = $_GET["id"];

// hago las consulas

session_start();
$_SESSION["msg-delete"] = "El registro se elimino correctamente $id";

header("Location: index.php");