<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale-=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="public/css/cliente.css">
    </head>
    <body>
        <img src="public/img/Logo.jpg" alt="Logo" class="Logo">
        <div class="main-container">
            <div class="container" style="max-height: 300px; overflow-y: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Direccion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($datos['proveedores'] as $proveedores) : ?>
                        <tr>
                            <td><?php echo $proveedores->nombre; ?></td>
                            <td><?php echo $proveedores->correo; ?></td>
                            <td><?php echo $proveedores->telefono; ?></td>
                            <td><?php echo $proveedores->direccion; ?></td>
                            <td><a href="<?php echo RUTA_URL; ?>/proveedores/editar/<?php echo $proveedores->id_proveedor; ?>">Editar</a></td>
                            <td><a href="<?php echo RUTA_URL; ?>/proveedores/borrar/<?php echo $proveedores->id_proveedor; ?>">Borrar</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="column">
                <button class="btn_regresar" onclick="window.location.href='<?php echo RUTA_URL; ?>/Menu'">Regresar</button>
                <button class="btn">Agregar</button>    
            </div>
        </div>
        <!--Creacion de la ventana modal-->
        <section class="modal">
            
                <!--este es el codigo del formulario-->
                <section class="container_modal">
                    <header>Registro de clientes</header>
            
                    <form action="<?php echo RUTA_URL; ?>/Proveedores/agregar" method="POST" class="form">
            
                        <div class="column">
                            <div class="input-box">
                                <label>Nombre</label>
                                <input type="text" name="nombre" placeholder="Ingresa el nombre" required>
                            </div>
                        
                            
                        </div>
                        
                        <div class="input-box">
                            <label>Email</label>
                            <input type="email" name="correo" placeholder="Ingresa el Email">
                        </div>
            
                        <div class="column">
                            <div class="input-box">
                                <label>Número de Teléfono</label>
                                <input type="number" name="telefono" placeholder="Ingresa el número de teléfono" required>
                            </div>
            
                            
                        </div>
            
                        <div class="input-box address">
                            <label>Dirección</label>
                            <input type="text" name="direccion"placeholder="Ingresa Dirección" required>
                        </div>
                        <button>Registrar</button>
                    </form>
                    <a href="#" class="modal_close">Cerrar</a>
                </section>
            
        </section>

        <script src="public/js/cliente.js"></script>
    </body>
</html>