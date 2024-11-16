<?php include('navbar.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuestros Seguros - SaveMe</title>

    <!-- Incluir el archivo CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet"> <!-- Bootstrap para estilos comunes -->
    <link href="css/index.css" rel="stylesheet"> <!-- Ajusta la ruta si es necesario para que apunte a tu archivo CSS general -->
</head>
<body>
    <main class="container mt-5">
        <h1>Nuestros Seguros</h1>
        <p>Explora nuestra gama de seguros diseñados para brindarte la mejor protección en diferentes aspectos de tu vida. Descubre cuál se adapta a tus necesidades y cómo podemos ayudarte a estar cubierto en todo momento.</p>

        <section class="row">
            <!-- Seguro 1: Seguro de Salud -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./images/seguro-salud.jpg" class="card-img-top" alt="Seguro de Salud">
                    <div class="card-body">
                        <h5 class="card-title">Seguro de Salud</h5>
                        <p class="card-text">
                            Nuestro seguro de salud te brinda cobertura en caso de emergencias médicas, consultas con especialistas y hospitalización. Además, tienes acceso a una red de hospitales y clínicas de alta calidad. 
                            <br><br>
                            <strong>Características:</strong>
                            <ul>
                                <li>Cobertura amplia para emergencias médicas.</li>
                                <li>Acceso a consultas con médicos especialistas.</li>
                                <li>Hospitalización y cirugías cubiertas.</li>
                                <li>Atención médica en el hogar en casos específicos.</li>
                            </ul>
                            <strong>Precio:</strong> Desde $199/mes.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Seguro 2: Seguro de Vida -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./images/seguro-vida.jpg" class="card-img-top" alt="Seguro de Vida">
                    <div class="card-body">
                        <h5 class="card-title">Seguro de Vida</h5>
                        <p class="card-text">
                            Este seguro está diseñado para garantizar la estabilidad financiera de tus seres queridos en caso de tu fallecimiento o incapacidad. Con el seguro de vida, tu familia estará protegida económicamente. 
                            <br><br>
                            <strong>Características:</strong>
                            <ul>
                                <li>Protección económica a tus beneficiarios.</li>
                                <li>Cobertura ante fallecimiento o incapacidad.</li>
                                <li>Plan flexible con distintas opciones de cobertura.</li>
                                <li>Beneficios adicionales como asistencia legal o psicológica.</li>
                            </ul>
                            <strong>Precio:</strong> Desde $250/mes.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Seguro 3: Seguro de Automóvil -->
            <div class="col-md-4">
                <div class="card">
                    <img src="./images/seguro-auto.jpg" class="card-img-top" alt="Seguro de Automóvil">
                    <div class="card-body">
                        <h5 class="card-title">Seguro de Automóvil</h5>
                        <p class="card-text">
                            El seguro de automóvil te protege contra accidentes, robo, daños materiales, y mucho más. Ofrecemos cobertura integral para cualquier eventualidad en la que se vea involucrado tu vehículo. 
                            <br><br>
                            <strong>Características:</strong>
                            <ul>
                                <li>Cobertura ante accidentes, robo y daños materiales.</li>
                                <li>Asistencia en carretera las 24 horas.</li>
                                <li>Opciones de cobertura a terceros o todo riesgo.</li>
                                <li>Descuentos especiales en talleres asociados.</li>
                            </ul>
                            <strong>Precio:</strong> Desde $150/mes.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h2>¿Por qué elegir SaveMe?</h2>
            <p>En SaveMe, nos comprometemos a brindarte la mejor protección en cada uno de nuestros seguros. Con una atención al cliente personalizada y la mejor asesoría, buscamos darte tranquilidad a ti y a tu familia.</p>
            <ul>
                <li>Atención 24/7</li>
                <li>Cobertura integral en múltiples áreas</li>
                <li>Planes personalizados a tus necesidades</li>
                <li>Red de hospitales y clínicas de alta calidad</li>
                <li>Descuentos y beneficios exclusivos para nuestros clientes</li>
            </ul>
        </section>

    </main>

    <?php include('footer.php'); ?>
</body>
</html>
