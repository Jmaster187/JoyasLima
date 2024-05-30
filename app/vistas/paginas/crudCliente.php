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
            <input type="text" id="searchInput" placeholder="Buscar clientes">
            <div class="container" style="max-height: 300px; overflow-y: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Fecha de nacimiento</th>
                            <th>Genero</th>
                            <th>Direccion</th>
                            <th>Ciudad</th>
                            <th>Opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($datos['clientes'] as $cliente) : ?>
                        <tr>
                            <td><?php echo $cliente->nombre; ?></td>
                            <td><?php echo $cliente->apellido; ?></td>
                            <td><?php echo $cliente->correo; ?></td>
                            <td><?php echo $cliente->telefono; ?></td>
                            <td><?php echo $cliente->fecha_nacimiento; ?></td>
                            <td><?php echo $cliente->genero; ?></td>
                            <td><?php echo $cliente->direccion; ?></td>
                            <td><?php echo $cliente->ciudad; ?></td>
                            <td><a href="<?php echo RUTA_URL; ?>/clientes/editar/<?php echo $cliente->id_cliente; ?>">Editar</a></td>
                            <td><a href="<?php echo RUTA_URL; ?>/clientes/borrar/<?php echo $cliente->id_cliente; ?>">Borrar</a></td>
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
            
                    <form action="<?php echo RUTA_URL; ?>/clientes/agregar" method="POST" class="form">
            
                        <div class="column">
                            <div class="input-box">
                                <label>Nombre</label>
                                <input type="text" name="nombre" placeholder="Ingresa el nombre" required>
                            </div>
                        
                            <div class="input-box">
                                <label>Apellido</label>
                                <input type="text" name="apellido" placeholder="Ingresa el apellido" required>
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
            
                            <div class="input-box">
                                <label>Fecha de nacimiento</label>
                                <input type="date" name="fecha_nacimiento" placeholder="Ingresa la fecha de nacimiento" required>
                            </div>
                        </div>
                        
                        <div class="gender-box">
                            <h3>Genero</h3>
            
                            <div class="gender-option">
                                <div class="gender">
                                    <input type="radio" id="check-male" name="genero" value="Masculino" checked>
                                    <label for="check-male">Masculino</label>
                                </div>
            
                                <div class="gender">
                                    <input type="radio" id="check-female" name="genero" value="Femenino" checked>
                                    <label for="check-female">Femenino</label>
                                </div>
                            </div>
                        </div>
            
                        <div class="input-box address">
                            <label>Dirección</label>
                            <input type="text" name="direccion"placeholder="Ingresa Dirección" required>
                            
            
                            <div class="column">
                                <input type="text" name="ciudad" placeholder="Ingresa tu ciudad" required>
                            </div>
                        </div>
                        <button>Registrar</button>
                    </form>
                    <a href="#" class="modal_close">Cerrar</a>
                </section>
            
        </section>

        <script src="public/js/cliente.js"></script>
    </body>
</html>