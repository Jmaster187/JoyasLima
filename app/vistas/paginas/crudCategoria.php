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
            <input type="text" id="searchInput" placeholder="Buscar Departamentos">
            <div class="container" style="max-height: 300px; overflow-y: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($datos['categorias'] as $categoria) : ?>
                        <tr>
                            <td><?php echo $categoria->nombre; ?></td>
                            <td><?php echo $categoria->descripcion; ?></td>
                          <!--  <td><a href="<?php echo RUTA_URL; ?>/clientes/editar/<?php echo $cliente->id_cliente; ?>">Editar</a></td> -->
                            <td><a href="<?php echo RUTA_URL; ?>/categorias/borrar/<?php echo $categoria->id_categoria; ?>">Borrar</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="column">
                <button class="btn_regresar" onclick="window.location.href='<?php echo RUTA_URL; ?>/Productos'">Regresar</button>
                <button class="btn">Agregar</button>    
            </div>
        </div>
        <!--Creacion de la ventana modal-->
        <section class="modal">
            
                <!--este es el codigo del formulario-->
                <section class="container_modal">
                    <header>Registro de categoria</header>
            
                    <form action="<?php echo RUTA_URL; ?>/categorias/agregar" method="POST" class="form">
            
                        <div class="column">
                            <div class="input-box">
                                <label>Nombre</label>
                                <input type="text" name="nombre" placeholder="Ingresa el nombre" required>
                            </div>
                        
                            <div class="input-box">
                                <label>Descripcion</label>
                                <input type="text" name="descripcion" placeholder="Ingresa una descripcion" required>
                            </div>
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