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
                <a href="<?php echo RUTA_URL; ?>/paginas/crudCliente" class="btn btn-light"><i class="fa fa-backward"></i>Volver</a>
                    <header>Editar informacion de clientes</header>
            
                    <form action="<?php echo RUTA_URL; ?>/clientes/editar/<?php echo $datos['id_cliente'] ?>" method="POST" class="form">
            
                        <div class="column">
                            <div class="input-box">
                                <label>Nombre</label>
                                <input type="text" name="nombre" placeholder="Ingresa el nombre" value="<?php echo $datos['nombre']; ?>" required>
                            </div>
                        
                            <div class="input-box">
                                <label>Apellido</label>
                                <input type="text" name="apellido" placeholder="Ingresa el apellido" value="<?php echo $datos['apellido']; ?>" required>
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
            
                            <div class="input-box">
                                <label>Fecha de nacimiento</label>
                                <input type="date" name="fecha_nacimiento" placeholder="Ingresa la fecha de nacimiento" value="<?php echo $datos['fecha_nacimiento']; ?>" required>
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
                            <input type="text" name="direccion"placeholder="Ingresa Dirección" value="<?php echo $datos['direccion']; ?>" required>
                            
            
                            <div class="column">
                                <input type="text" name="ciudad" placeholder="Ingresa tu ciudad" value="<?php echo $datos['ciudad']; ?>" required>
                            </div>
                        </div>
                        <button href="<?php echo RUTA_URL; ?>/paginas/crudCliente" class="btn btn-light" onclick="return confirmUpdate()">Actualizar</button>
                    </form>
                </section>

                <script>
                    function confirmUpdate(){
                        return confirm("Estas seguro de actualizar");
                    }
                </script>
            
        

        <script src="../public/agregar/app.js"></script>
    </body>
</html>