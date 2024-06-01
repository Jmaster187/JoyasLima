<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link css-->
    <link rel="stylesheet" href="<?php echo RUTA_PUBLIC; ?>/css/inicio.css">

    <!-- Link iconos-->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <title>Pagina Principal</title>
</head>
<body>
    <header class="header">
        <nav class="nav">
            <a href="<?php echo RUTA_URL; ?>/paginas/inicio" class="nav_logo"></a>
            <ul class="nav_items">
                <li class="nav_item">
                </li>
            </ul>
            <button class="button" id="form-open">Acceder</button>
        </nav>
    </header>
    <section class="home">
        <div class="form_container">
            <i class="uil uil-times form_close"></i>

            <!-- Login -->
            <div class="form login_form">
                <form action="<?php echo RUTA_URL; ?>/paginas/inicio" method="POST" >
                    <h2>Ingresar</h2>
                    

                    <div class="input_box">
                        <input type="text" id="nombre_usuario" name="nombre_usuario" placeholder="Ingresa tu usuario" required>
                        <i class="uil uil-envelope-alt email"></i>
                    </div>

                    <div class="input_box">
                        <input type="password" id="contraseña" name="contraseña" placeholder="Ingresa tu contraseña" required>
                        <i class="uil uil-lock password"></i>
                        <i class="uil uil-eye-slash pw_hide"></i>
                    </div>

                    <div class="option_field">
                        <span class="checkbox">
                            <input type="checkbox" id="check">
                            <label for="check">Recordarme</label>
                        </span>

                        <a href="#" class="forgot_pw">¿Olvidaste tu contraseña</a>
                    </div>

                    <button class="button">Iniciar Sesion</button>
                    
                </form>
            </div>

           
        </div>
    </section>
    <script src="<?php echo RUTA_PUBLIC; ?>/js/inicio.js"></script>
    <script>
        <?php if(!empty($datos['error'])): ?>
            alert('<?php echo $datos['error']; ?>');
            <?php endif; ?>
    </script>
</body>
</html>