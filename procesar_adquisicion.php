<?php
session_start();
include('db_connection.php');

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Obtener datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el usuario actual
    $username = $_SESSION['username'];
    $queryUser = "SELECT id FROM usuarios WHERE username = '$username'";
    $resultUser = $conn->query($queryUser);
    $userId = $resultUser->fetch_assoc()['id'];

    // Datos del formulario
    $tipo_seguro = (int)$_POST['tipo_seguro'];
    $cobertura = isset($_POST['cobertura']) ? implode(", ", $_POST['cobertura']) : '';
    $periodo = (int)$_POST['periodo'];

    // Buscar el seguro seleccionado por id
    $querySeguro = "SELECT id, prima_mensual FROM seguros WHERE id = '$tipo_seguro'";
    $resultSeguro = $conn->query($querySeguro);

    if ($resultSeguro->num_rows > 0) {
        $seguro = $resultSeguro->fetch_assoc();
        $seguroId = $seguro['id'];
        $primaMensual = $seguro['prima_mensual'];

        // Verificar si ya existe una personalización igual
        $queryExistente = "
            SELECT 1 FROM personalizacion_polizas 
            WHERE id_usuario = $userId AND id_seguro = $seguroId AND cobertura_adicional = '$cobertura' AND periodo = $periodo";
        $resultExistente = $conn->query($queryExistente);

        if ($resultExistente->num_rows == 0) {
            // Insertar personalización en `personalizacion_polizas`
            $queryPersonalizacion = "
                INSERT INTO personalizacion_polizas (id_usuario, id_seguro, cobertura_adicional, periodo)
                VALUES ($userId, $seguroId, '$cobertura', $periodo)";

            if ($conn->query($queryPersonalizacion) === TRUE) {
                // Calcular monto total
                $montoTotal = $primaMensual * $periodo;

                // Redirigir al usuario con PRG Pattern
                header("Location: confirmacion.php?status=success&monto=$montoTotal");
                exit();
            } else {
                echo "Error en la personalización de la póliza: " . $conn->error;
            }
        } else {
            echo "Esta personalización ya existe.";
        }
    } else {
        echo "Seguro no encontrado.";
    }
} else {
    echo "Método no permitido.";
}
?>
