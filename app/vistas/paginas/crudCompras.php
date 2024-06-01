<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale-=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="<?php echo RUTA_PUBLIC; ?>/css/cliente.css">
    </head>
    <body>
       
        <img src="public/img/Logo.jpg" alt="Logo" class="Logo">
        <div class="main-container">
            <input type="text" id="searchInput" placeholder="Buscar Departamentos">
            <div class="container" style="max-height: 300px; overflow-y: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>Proveedor</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio total</th>
                            <th>Fecha</th>
                            <th>Opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($datos['compras'] as $compra) : ?>
                        <tr>
                            <td><?php echo $compra->nombre_proveedor; ?></td>
                            <td><?php echo $compra->codigo_producto; ?></td>
                            <td><?php echo $compra->cantidad; ?></td>
                            <td><?php echo $compra->precio_total; ?></td>
                            <td><?php echo $compra->fecha; ?></td>
                          <!--  <td><a href="<?php echo RUTA_URL; ?>/clientes/editar/<?php echo $cliente->id_cliente; ?>">Editar</a></td> -->
                            <!-- <td><a href="<?php echo RUTA_URL; ?>/departamentos/borrar/<?php echo $departamento->id_departamento; ?>">Borrar</a></td> -->
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
            
                    <form action="<?php echo RUTA_URL; ?>/compras/agregar" method="POST" class="form">
            
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
                            
                        </div>
                        
                        <div class="column">
                            <label>Proveedor</label>
                            <select class="input-box" name="id_proveedor" require>
                                <?php foreach($datos['proveedores'] as $proveedor) : ?>
                                    <option value="<?php echo $proveedor->id_proveedor; ?>"><?php echo $proveedor->nombre; ?></option>

                                    <?php endforeach; ?>
                          
                            
                            </select>

                            <label>Categoria</label>
                            <select name="id_categoria" require>
                                <?php foreach($datos['departamentos'] as $departamento) : ?>
                                    <option value="<?php echo $departamento->id_departamento; ?>"><?php echo $departamento->nombre; ?></option>

                                    <?php endforeach; ?>
                          
                            
                            </select>
                            
                        </div>
            
                        
                        </div>
                        <button>Registrar</button>
                    </form>
                    <a href="#" class="modal_close">Cerrar</a>
                </section>
            
        </section>

        <script src="<?php echo RUTA_PUBLIC; ?>/js/cliente.js"></script>
    </body>
</html>