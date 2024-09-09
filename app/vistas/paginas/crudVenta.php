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
       
        <img src="<?php echo RUTA_PUBLIC; ?>/img/Logo.jpg" alt="Logo" class="Logo">
        <div class="main-container">
            <input type="text" id="searchInput" placeholder="Buscar Departamentos">
            <div class="container" style="max-height: 300px; overflow-y: auto;">
                <table class="styled-table">
                    <thead>
                        <tr>
                            <th>cliente</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio total</th>
                            <th>Fecha</th>
                            <th>Opciones</th>

                        </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($datos['ventas'])): ?>
                        <?php foreach($datos['ventas'] as $venta) : ?>
                            <tr>
                                <td><?php echo $venta->nombre_cliente; ?></td>
                                <td><?php echo $venta->codigo_producto; ?></td>
                                <td><?php echo $venta->cantidad; ?></td>
                                <td><?php echo $venta->precio_total; ?></td>
                                <td><?php echo $venta->fecha; ?></td>
                            <!--  <td><a href="<?php echo RUTA_URL; ?>/clientes/editar/<?php echo $cliente->id_cliente; ?>">Editar</a></td> -->
                                <td><a href="<?php echo RUTA_URL; ?>/Ventas/borrar/<?php echo $venta->id_venta; ?>">Borrar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
                    <header>Registro de Ventas</header>
            
                    <form action="<?php echo RUTA_URL; ?>/ventas/agregar" method="POST" class="form">
            
                        <div class="column">
                        <label>Producto</label>
                            <select class="input-box" name="id_producto" require>
                                <?php foreach($datos['productos'] as $producto) : ?>
                                    <option value="<?php echo $producto->id_producto; ?>"><?php echo $producto->codigo; ?></option>

                                    <?php endforeach; ?>
                          
                            
                            </select>
                        
                            <label>Cliente</label>
                            <select class="input-box" name="id_cliente" require>
                                <?php foreach($datos['clientes'] as $cliente) : ?>
                                    <option value="<?php echo $cliente->id_cliente; ?>"><?php echo $cliente->nombre; ?></option>

                                    <?php endforeach; ?>
                          
                            
                            </select>
                            
                        </div>
                        <div class="column">
                            <div class="input-box">
                                <label>Cantidad</label>
                                <input type="number" name="cantidad" placeholder="Ingresa la cantidad" required>
                            </div>

                            <div class="input-box">
                                <label>Precio Total</label>
                                <input type="number" name="precio_total" placeholder="Total de la compra" required>
                            </div>
                            
                        </div>
                        
                        <div class="column">
                        <div class="input-box">
                                <label>Fecha de Venta</label>
                                <input type="date" name="fecha" placeholder="Ingresa la fecha" required>
                            </div>
                            
                        </div>
            
                        
                        </div>
                        <button>Registrar</button>
                    </form>
                    <a href="#" class="modal_close">Cerrar</a>
                </section>
            
        </section>

        <!-- Mostrar una alerta si no hay stock -->
        <?php if (!empty($datos['error'])) : ?>
            <script>
                alert('<?php echo $datos['error']; ?>');
            </script>
        <?php endif; ?>

        <script src="<?php echo RUTA_PUBLIC; ?>/js/cliente.js"></script>
    </body>
</html>