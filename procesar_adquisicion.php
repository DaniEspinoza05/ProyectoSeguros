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
    $tipo_seguro = $conn->real_escape_string($_POST['tipo_seguro']);
    $cobertura = isset($_POST['cobertura']) ? implode(", ", $_POST['cobertura']) : '';
    $periodo = (int)$_POST['periodo'];
    $metodo_pago = $conn->real_escape_string($_POST['metodo_pago']);

    // Buscar el seguro seleccionado
    $querySeguro = "SELECT id, prima_mensual FROM seguros WHERE tipo = '$tipo_seguro'";
    $resultSeguro = $conn->query($querySeguro);
    if ($resultSeguro->num_rows > 0) {
        $seguro = $resultSeguro->fetch_assoc();
        $seguroId = $seguro['id'];
        $primaMensual = $seguro['prima_mensual'];

        // Buscar el método de pago seleccionado
        $queryMetodoPago = "SELECT id FROM metodos_pago WHERE nombre_metodo = '$metodo_pago'";
        $resultMetodoPago = $conn->query($queryMetodoPago);
        if ($resultMetodoPago->num_rows > 0) {
            $metodoPagoId = $resultMetodoPago->fetch_assoc()['id'];

            // Insertar personalización en `personalizacion_polizas`
            $queryPersonalizacion = "
                INSERT INTO personalizacion_polizas (id_usuario, id_seguro, cobertura_adicional, periodo)
                VALUES ($userId, $seguroId, '$cobertura', $periodo)";
            $conn->query($queryPersonalizacion);

            // Registrar el pago en `pagos`
            $montoTotal = $primaMensual * $periodo;
            $queryPago = "
                INSERT INTO pagos (id_usuario, id_seguro, id_metodo_pago, monto)
                VALUES ($userId, $seguroId, $metodoPagoId, $montoTotal)";
            $conn->query($queryPago);

            // Redirigir al usuario con un mensaje de éxito
            header("Location: confirmacion.php?status=success&monto=$montoTotal");
            exit();
        } else {
            echo "Método de pago no válido.";
        }
    } else {
        echo "Seguro no encontrado.";
    }
} else {
    echo "Método no permitido.";
}
?>
