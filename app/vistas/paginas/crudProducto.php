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
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($datos['productos'] as $producto) : ?>
                        <tr>
                            <td><?php echo $producto->codigo; ?></td>
                            <td><?php echo $producto->descripcion; ?></td>
                            <td><?php echo 'Q',$producto->precio; ?></td>
                            <td><?php echo $producto->stock; ?></td>
                          <!--  <td><a href="<?php echo RUTA_URL; ?>/clientes/editar/<?php echo $cliente->id_cliente; ?>">Editar</a></td> -->
                            <td><a href="<?php echo RUTA_URL; ?>/departamentos/borrar/<?php echo $departamento->id_departamento; ?>">Borrar</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="column">
                <button class="btn_regresar" onclick="window.location.href='<?php echo RUTA_URL; ?>/Menu'">Regresar</button>
                <button class="btn">Agregar</button>
                <button class="btn" onclick="window.location.href='<?php echo RUTA_URL; ?>/Categorias'">Categoria</button>   
            </div>
        </div>
        <!--Creacion de la ventana modal-->
        <section class="modal">
            
                <!--este es el codigo del formulario-->
                <section class="container_modal">
                    <header>Registro de productos</header>
            
                    <form action="<?php echo RUTA_URL; ?>/productos/agregar" method="POST" class="form">
            
                        <div class="column">
                            <div class="input-box">
                                <label>Codigo</label>
                                <input type="text" name="codigo" placeholder="Ingresa el codigo" required>
                            </div>
                        
                            <div class="input-box">
                                <label>Descripcion</label>
                                <input type="text" name="descripcion" placeholder="Ingresa una descripcion" >
                            </div>
                            
                        </div>
                        <div class="column">
                            <div class="input-box">
                                <label>Precio</label>
                                <input type="number" step="0.01" name="precio" placeholder="Ingresa el precio" required>
                            </div>
                        
                            <div class="input-box">
                                <label>Descripcion</label>
                                <input type="text" name="descripcion" placeholder="Ingresa una descripcion" required>
                            </div>
                            
                        </div>
                        
                        <div class="column">
                            <label>Proveedor</label>
                            <select name="id_proveedor" require>
                          
                            
                            </select>
                            
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