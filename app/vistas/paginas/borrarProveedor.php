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
            
                <!--este es el codigo del formulario-->
                <section class="container_modal">
                <a href="<?php echo RUTA_URL; ?>/Proveedores" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
                    <header>Borrar proveedor</header>

                    <?php if (!empty($datos['error'])): ?>
                        <div class="alerta">
                            <?php echo $datos['error']; ?>
                        </div>
                        <?php endif; ?>
            
                    <form action="<?php echo RUTA_URL; ?>/proveedores/borrar/<?php echo $datos['id_proveedor'] ?>" method="POST" class="form">
            
                        <div class="column">
                            <div class="input-box">
                                <label>Nombre</label>
                                <input type="text" name="nombre" placeholder="Ingresa el nombre" value="<?php echo $datos['nombre']; ?>" required readonly>
                            </div>
                        </div>
                        
                        <div class="input-box">
                            <label>Email</label>
                            <input type="email" name="correo" placeholder="Ingresa el Email" value="<?php echo $datos['correo']; ?>" readonly>
                        </div>
            
                        <div class="column">
                            <div class="input-box">
                                <label>Número de Teléfono</label>
                                <input type="number" name="telefono" placeholder="Ingresa el número de teléfono" value="<?php echo $datos['telefono']; ?>" required readonly>
                            </div>
                        </div>
            
                        <div class="input-box address">
                            <label>Dirección</label>
                            <input type="text" name="direccion"placeholder="Ingresa Dirección" value="<?php echo $datos['direccion']; ?>" required readonly>
                        </div>
                        <button href="<?php echo RUTA_URL; ?>/paginas" class="btn btn-light" onclick="return confirmDelete()">Borrar</button>
                    </form>
                </section>

                <script>
                    function confirmDelete(){
                        return confirm("Estas seguro de borrar");
                    }
                </script>
            
        

        <script src="../public/agregar/app.js"></script>
    </body>
</html>