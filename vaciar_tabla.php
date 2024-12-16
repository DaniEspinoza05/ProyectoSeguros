<?php
session_start();
include('db_connection.php'); // Make sure this file sets up the database connection

try {
    // Prepare the SQL query to empty the table
    $query = "TRUNCATE TABLE personalizacion_polizas";
    $result = $conn->query($query);

    if ($result) {
        echo "Tabla vaciada correctamente";
    } else {
        throw new Exception("Error al vaciar la tabla: " . $conn->error);
    }
} catch (Exception $e) {
    // Handle the error
    echo "Se ha producido un error: " . $e->getMessage();
} finally {
    // Close the database connection if it's not closed yet
    $conn->close();
}
?>
