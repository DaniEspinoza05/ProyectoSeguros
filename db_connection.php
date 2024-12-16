<?php
$servername = "localhost:3306";
$username = "root"; // usuario de MySQL
$password = "10Estupidos"; // contraseña de MySQL
$dbname = "SaveMe";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
