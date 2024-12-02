<?php
session_start();
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a SaveMe</title>

    <!-- Fuentes y Bootstrap -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/index.css" rel="stylesheet"> 


    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        .hero {
            background: url('./images/hero.jpg') center/cover no-repeat;
            height: 400px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .cta-button {
            background-color: #f67c01;
            border: none;
            color: white;
            padding: 10px 20px;
            border-radius: 25px;
            transition: background-color 0.3s ease-in-out;
        }
        .cta-button:hover {
            background-color: #d66b01;
        }
        .stats {
            display: flex;
            justify-content: space-around;
            padding: 20px;
            background-color: #f4f4f4;
            border-radius: 10px;
        }
        .stat {
            text-align: center;
        }
        .testimonio {
            font-style: italic;
            color: #555;
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1 class="display-4">Protección que Inspira Confianza</h1>
            <p class="lead">En SaveMe, hacemos que el seguro sea simple y accesible.</p>
            <a href="registro.php" class="cta-button">Regístrate Ahora</a>
        </div>
    </div>

    <!-- Contenido Principal -->
    <main class="container my-5">
        <!-- Promociones -->
        <section class="mb-5">
            <h2 class="text-center mb-4">Promociones del Mes</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="./images/promo1.jpg" class="card-img-top" alt="Seguro Salud">
                        <div class="card-body text-center">
                            <h5 class="card-title">Seguro de Salud</h5>
                            <p class="card-text">¡50% de descuento en el primer año para nuevos clientes!</p>
                            <a href="#" class="btn btn-primary">Cotiza Ahora</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="./images/promo2.jpg" class="card-img-top" alt="Seguro de Vida">
                        <div class="card-body text-center">
                            <h5 class="card-title">Seguro de Vida</h5>
                            <p class="card-text">Cobertura completa con descuentos para familias.</p>
                            <a href="#" class="btn btn-primary">Cotiza Ahora</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <img src="./images/promo3.jpg" class="card-img-top" alt="Seguro Automotriz">
                        <div class="card-body text-center">
                            <h5 class="card-title">Seguro Automotriz</h5>
                            <p class="card-text">¡Recibe un chequeo mecánico gratis al contratar!</p>
                            <a href="#" class="btn btn-primary">Cotiza Ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonios -->
        <section class="my-5">
            <h2 class="text-center mb-4">Lo que dicen nuestros clientes</h2>
            <div class="testimonio text-center">
                <p>"Gracias a SaveMe, estoy tranquilo sabiendo que mi familia está protegida. Su atención al cliente es insuperable." - <strong>Juan Pérez</strong></p>
                <p>"Contratar mi seguro fue tan fácil y rápido, además de ser súper claro." - <strong>María González</strong></p>
            </div>
        </section>

        <!-- Estadísticas -->
        <section class="mb-5">
            <h2 class="text-center mb-4">Nuestros Números Hablan</h2>
            <div class="stats">
                <div class="stat">
                    <h3>10,000+</h3>
                    <p>Clientes Satisfechos</p>
                </div>
                <div class="stat">
                    <h3>15 Años</h3>
                    <p>De Experiencia</p>
                </div>
                <div class="stat">
                    <h3>24/7</h3>
                    <p>Asistencia Disponible</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
