<?php 
include('auth.php');
include('navbar.php');
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adquisición de Seguros - SaveMe</title>
    <link href="css/index.css" rel="stylesheet"> <!-- Ajusta la ruta si es necesario -->
</head>
<body>
    <main class="container mt-5">
        <h1 class="text-center">Adquisición de Seguros</h1>
        <p class="text-center">Selecciona el seguro que deseas adquirir y personaliza tu póliza para adaptarla a tus necesidades.</p>

        <!-- Selección de Seguro -->
        <section class="mt-4">
            <h2>1. Selección del Tipo de Seguro</h2>
            <form action="procesar_adquisicion.php" method="POST">
                <div class="form-group">
                    <label for="tipo_seguro">Elige el tipo de seguro:</label>
                    <select id="tipo_seguro" name="tipo_seguro" class="form-control" required>
                        <option value="" disabled selected>Seleccione un tipo de seguro</option>
                        <option value="Salud">Seguro de Salud</option>
                        <option value="Vida">Seguro de Vida</option>
                        <option value="Automóviles">Seguro de Automóvil</option>
                        <option value="Propiedades">Seguro de Propiedades</option>
                        <option value="Viajes">Seguro de Viajes</option>
                    </select>
                </div>

                <!-- Personalización de la póliza -->
                <div class="mt-4">
                    <h2>2. Personalización de la Póliza</h2>
                    <div class="form-group">
                        <label>Coberturas adicionales:</label><br>
                        <input type="checkbox" name="cobertura[]" value="Accidentes Personales"> Accidentes Personales<br>
                        <input type="checkbox" name="cobertura[]" value="Robo"> Robo<br>
                        <input type="checkbox" name="cobertura[]" value="Daños Materiales"> Daños Materiales<br>
                        <input type="checkbox" name="cobertura[]" value="Asistencia en el Extranjero"> Asistencia en el Extranjero
                    </div>
                    <div class="form-group">
                        <label for="periodo">Duración (meses):</label>
                        <input type="number" id="periodo" name="periodo" class="form-control" min="1" max="24" required>
                    </div>
                </div>

                <!-- Método de Pago -->
                <div class="mt-4">
                    <h2>3. Método de Pago</h2>
                    <div class="form-group">
                        <label for="metodo_pago">Selecciona el método de pago:</label>
                        <select id="metodo_pago" name="metodo_pago" class="form-control" required>
                            <option value="" disabled selected>Seleccione un método de pago</option>
                            <option value="Tarjeta de Crédito">Tarjeta de Crédito</option>
                            <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                            <option value="Efectivo">Efectivo</option>
                        </select>
                    </div>
                </div>

                <!-- Botón para procesar -->
                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-success">Adquirir Seguro</button>
                </div>
            </form>
        </section>
    </main>

    <?php include('footer.php'); ?>
</body>
</html>
