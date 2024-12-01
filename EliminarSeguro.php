<?php
session_start();
include('db_connection.php');  // Incluye tu conexión a la base de datos

// Verificar acceso
if (!isset($_SESSION['username']) || $_SESSION['rol'] != 1) {
    header('Location: login.php');
    exit();
}

// Verificar si se proporcionó un ID válido
if (!isset($_GET['id'])) {
    header('Location: VerSeguros.php?msg=ID no especificado');
    exit();
}

$id = intval($_GET['id']); // Sanitizar el ID

// Eliminar el seguro
$query = "DELETE FROM seguros WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    header('Location: VerSeguros.php?msg=Seguro eliminado exitosamente');
    exit();
} else {
    echo "Error al eliminar el seguro: " . $conn->error;
}
?>
