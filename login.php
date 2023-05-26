<?php
$host = "localhost";
$usuario = "";
$contra = "";
$bd = "";

$conn = new mysqli($server, $usuario, $contra, $bd);

if ($conn->connect_error) {
    die("Fallo: " . $conn->connect_error);
}

$correo = $_POST['correo'];
$cuenta = $_POST['cuenta'];

$url = "privado.php";

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ? AND cuenta = ?");
$stmt->bind_param("ss", $correo, $cuenta);
$stmt->execute();

$result = $stmt->get_result();

header("Location: " . $url);

$stmt->close();
$conn->close();
?>
