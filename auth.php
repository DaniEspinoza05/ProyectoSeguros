<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirige al login si no ha iniciado sesión
    exit();
}
?>
