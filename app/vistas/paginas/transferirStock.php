<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transferir Stock</title>
    <link rel="stylesheet" href="<?php echo RUTA_PUBLIC; ?>/css/cliente.css">
</head>
<body>
    <h1>Transferir Stock a Departamento</h1>
    <form action="<?php echo RUTA_URL; ?>/productos/transferirStock" method="POST">
        <div>
            <label for="id_producto">Producto:</label>
            <select name="id_producto" required>
                <?php foreach($datos['productos'] as $producto) : ?>
                    <option value="<?php echo $producto->id_producto; ?>"><?php echo $producto->codigo; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="id_departamento">Departamento:</label>
            <select name="id_departamento" required>
                <?php foreach($datos['departamentos'] as $departamento) : ?>
                    <option value="<?php echo $departamento->id_departamento; ?>"><?php echo $departamento->nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" required>
        </div>
        <button type="submit">Transferir</button>
    </form>
    <?php if (!empty($datos['error'])) : ?>
        <div class="error"><?php echo $datos['error']; ?></div>
    <?php endif; ?>
</body>
</html>
