<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code</title>

    <!-- Google font iconos-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/menu.css">
</head>
<body>
    <aside class="sidebar">
        <div class="logo">
            <img src="img/Logo.jpg" alt="logo">
            <h2>Lima Systems</h2>
        </div>
        <ul class="links">

            <h4>Menu principal</h4>
            <li>
                <span class="material-symbols-outlined">Transcribe</span>
                <a href="<?php echo RUTA_URL; ?>/proveedores">Proveedores</a>
            </li>
            <li>
                <span class="material-symbols-outlined">Accessibility</span>
                <a href="<?php echo RUTA_URL; ?>/clientes">Clientes</a>
            </li>

            <li>
                <span class="material-symbols-outlined">store</span>
                <a href="<?php echo RUTA_URL; ?>/departamentos">Departamentos</a>
            </li>

            <li>
                <span class="material-symbols-outlined">Orders</span>
                <a href="<?php echo RUTA_URL; ?>/Productos">Productos</a>
            </li>

            <li>
                <span class="material-symbols-outlined">shopping_cart</span>
                <a href="<?php echo RUTA_URL; ?>/Compras">Compras</a>
            </li>
            <li>
                <span class="material-symbols-outlined">credit_card</span>
                <a href="#">Ventas</a>
            </li>
            <li>
                <span class="material-symbols-outlined">bar_chart</span>
                <a href="#">Inventario</a>
            </li>

            <hr>

            <h4>Cuenta</h4>
            <li>
                <span class="material-symbols-outlined">settings</span>
                <a href="#">Ajustes</a>
            </li>
            <li class="logout-link">
                <span class="material-symbols-outlined">Logout</span>
                <a href="<?php echo RUTA_URL; ?>/paginas/inicio">Cerrar sesión</a>
            </li>
        </ul>
    </aside>
</body>
</html>