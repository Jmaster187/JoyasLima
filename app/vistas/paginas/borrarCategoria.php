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
            
                <!--este es el codigo del formulario-->
                <section class="container_modal">
                <a href="<?php echo RUTA_URL; ?>/Categorias" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
                    <header>Borrar Categoria</header>
            
                    <form action="<?php echo RUTA_URL; ?>/categorias/borrar/<?php echo $datos['id_categoria'] ?>" method="POST" class="form">
            
                        <div class="column">
                            <div class="input-box">
                                <label>Nombre</label>
                                <input type="text" name="nombre" placeholder="Ingresa el nombre" value="<?php echo $datos['nombre']; ?>" required readonly>
                            </div>
                        </div>
                        
                        <div class="input-box">
                            <label>Descripcion</label>
                            <input type="text" name="descripcion" value="<?php echo $datos['descripcion']; ?>" readonly>
                        </div>
                        
                        <button href="<?php echo RUTA_URL; ?>/Categorias" class="btn btn-light" onclick="return confirmDelete()">Borrar</button>
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