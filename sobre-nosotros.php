<?php
session_start();
include('navbar.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros - SaveMe</title>

    <!-- Fuentes de Google -->
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
        .hero-image {
            background: url('./images/SaveMe.jpg') center/cover no-repeat;
            height: 300px;
            position: relative;
        }
        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .card {
            border: none;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <!-- Hero Section -->
    <div class="hero-image">
        <div class="hero-overlay">
            <h1 class="display-4">SaveMe</h1>
            <p class="lead">Tu tranquilidad, nuestra prioridad</p>
        </div>
    </div>

    <!-- Contenido Principal -->
    <main class="container my-5">
        <!-- Quiénes Somos -->
        <section class="mb-5">
            <h2 class="text-center mb-4">Quiénes Somos</h2>
            <p class="text-justify">
                En SaveMe, una aseguradora ubicada en **San José, Costa Rica**, nos dedicamos a proporcionar 
                soluciones aseguradoras confiables y accesibles. Nuestra misión es proteger lo que más importa: 
                tu familia, tus bienes y tu tranquilidad. Con más de 15 años de experiencia, combinamos tecnología 
                de vanguardia y un enfoque humano para ofrecerte un servicio excepcional.
            </p>
        </section>

        <!-- Cards con Beneficios o Servicios -->
        <section class="mb-5">
            <h2 class="text-center mb-4">Por qué Elegirnos</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card text-center p-3 shadow-sm">
                        <img src="./images/personalizado.jpg" class="card-img-top rounded" alt="Seguro Salud">
                        <div class="card-body">
                            <h5 class="card-title">Seguros Personalizados</h5>
                            <p class="card-text">Diseñamos coberturas adaptadas a tus necesidades específicas, 
                            ya sea salud, vida o propiedades.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-3 shadow-sm">
                        <img src="./images/atencion.jpg" class="card-img-top rounded" alt="Atención al Cliente">
                        <div class="card-body">
                            <h5 class="card-title">Atención Cercana</h5>
                            <p class="card-text">Un equipo de expertos comprometidos con brindarte la mejor experiencia y asesoramiento.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center p-3 shadow-sm">
                        <img src="./images/innovacion.jpg" class="card-img-top rounded" alt="Innovación">
                        <div class="card-body">
                            <h5 class="card-title">Innovación Constante</h5>
                            <p class="card-text">Utilizamos herramientas digitales para hacer que cada proceso sea rápido, 
                            claro y eficiente.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contacto -->
        <section class="bg-light p-4 rounded shadow-sm text-center">
            <h2 class="mb-3">¿Cómo contactarnos?</h2>
            <p>Estamos aquí para ayudarte en cualquier momento:</p>
            <ul class="list-unstyled">
                <li><strong>Ubicación:</strong> San José, Costa Rica</li>
                <li><strong>WhatsApp:</strong> <a href="https://wa.me/88387273" class="text-decoration-none text-success">88387273</a></li>
                <li><strong>Teléfono:</strong> <a href="tel:+50622769252" class="text-decoration-none">2276-9252</a></li>
            </ul>
        </section>
    </main>

    <!-- Footer -->
    <?php include('footer.php'); ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
