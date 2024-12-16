<header>
    <div class="header-content">
        <!-- Logo -->
        <img src="./images/logo.jpg" alt="Logo de la Empresa" class="logo">

        <!-- Menú de navegación -->
        <nav>
            <ul class="menu">
                <li class="menu-item"><a href="index.php">Inicio</a></li>
                <li class="menu-item"><a href="personalizar_seguro.php">Personalizar Seguro</a></li>
                <li class="menu-item"><a href="seguros.php">Seguros</a></li>
                <li class="menu-item"><a href="calculadora.php">Calculadora de Pólizas</a></li>
                <li class="menu-item"><a href="sobre-nosotros.php">Sobre Nosotros</a></li>
                <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 1): ?>
                    <li class="menu-item"><a href="verSeguros.php">Administrativo</a></li>
                <?php endif; ?>
                <li class="menu-item"><a href="carrito.php">Carrito</a></li>
                <?php if (isset($_SESSION['username'])): ?>
                    <li class="menu-item"><a href="logout.php">Cerrar sesión</a></li>
                <?php else: ?>
                    <li class="menu-item"><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</header>
