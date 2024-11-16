<?php
session_start();
if (!isset($_SESSION['username'])) {
    // Redirigir al login si no hay sesión activa
    header("Location: login.php");
    exit();
}
?>

<!-- Contenido del dashboard -->
<h1>Bienvenido al Dashboard, <?php echo $_SESSION['username']; ?>!</h1>
