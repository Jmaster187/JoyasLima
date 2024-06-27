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
                <a href="<?php echo RUTA_URL; ?>/Ventas" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
                    <header>Borrar informacion de clientes</header>
            
                    <form action="<?php echo RUTA_URL; ?>/Ventas/borrar/<?php echo $datos['id_venta'] ?>" method="POST" class="form">
            
                        <div class="column">
                            <div class="input-box">
                                <label>Cliente</label>
                                <input type="text" name="nombre" value="<?php echo $datos['nombre']; ?>" required readonly>
                            </div>
                        </div>

                        <div class="column">
                            <div class="input-box">
                                <label>Producto</label>
                                <input type="text" name="codigo" value="<?php echo $datos['codigo']; ?>" required readonly>
                            </div>
                        </div>
                        
                        <div class="input-box">
                            <label>Cantidad</label>
                            <input type="text" name="cantidad" value="<?php echo $datos['cantidad']; ?>" readonly>
                        </div>
                        
                        <button href="<?php echo RUTA_URL; ?>/Ventas" class="btn btn-light" onclick="return confirmDelete()">Borrar</button>
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