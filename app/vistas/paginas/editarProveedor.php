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
                <a href="<?php echo RUTA_URL; ?>/proveedores" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
                    <header>Editar informacion de proveedores</header>
            
                    <form action="<?php echo RUTA_URL; ?>/proveedores/editar/<?php echo $datos['id_proveedor'] ?>" method="POST" class="form">
            
                        <div class="column">
                            <div class="input-box">
                                <label>Nombre</label>
                                <input type="text" name="nombre" placeholder="Ingresa el nombre" value="<?php echo $datos['nombre']; ?>" required readonly>
                            </div>
                        </div>
                        
                        <div class="input-box">
                            <label>Email</label>
                            <input type="email" name="correo" placeholder="Ingresa el Email" value="<?php echo $datos['correo']; ?>">
                        </div>
            
                        <div class="column">
                            <div class="input-box">
                                <label>Número de Teléfono</label>
                                <input type="number" name="telefono" placeholder="Ingresa el número de teléfono" value="<?php echo $datos['telefono']; ?>" required>
                            </div>
                        </div>
            
                        <div class="input-box address">
                            <label>Dirección</label>
                            <input type="text" name="direccion"placeholder="Ingresa Dirección" value="<?php echo $datos['direccion']; ?>" required>
s
                        <button href="<?php echo RUTA_URL; ?>/paginas/crudCliente" class="btn btn-light" onclick="return confirmUpdate()">Actualizar</button>
                    </form>
                </section>

                <script>
                    function confirmUpdate(){
                        return confirm("Estas seguro de actualizar");
                    }
                </script>
            
        

        <script src="/public/js/cliente.js"></script>
    </body>
</html>