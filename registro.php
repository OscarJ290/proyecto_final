<?php
$cuenta = $_POST['cuenta'];
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$carrera = $_POST['carrera'];

$host = '';
$db = '';
$user = '';
$pas = '';

$fecha = date('Y-m-d');
$url="index.html";

$dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pas);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
$stmt = $dbh->prepare("INSERT INTO usuarios (cuenta, nombre, correo, carrera, fecha) VALUES (:cuenta, :nombre, :correo, :carrera, :fecha)");
$stmt->bindParam(':cuenta', $cuenta);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':correo', $correo);
$stmt->bindParam(':carrera', $carrera);
$stmt->bindParam(':fecha', $fecha);
$stmt->execute();
  
$dbh = null;
  
header("Location: " . $url);
?>
