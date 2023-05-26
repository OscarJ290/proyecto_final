<?php

$host = '';
$user = '';
$pas = '';
$db = '';

$conexion = new mysqli($host, $user, $pas, $db);

$cuenta = $_POST['cuenta'];

$consulta = "DELETE FROM usuarios WHERE cuenta = '$cuenta'";

$conexion->query($consulta);

header("Location: " . "privado.php");

$conexion->close();
?>
