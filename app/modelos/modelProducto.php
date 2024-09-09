<?php
    // este codigo es para hacer interaccion con la base de datos
    class modelProducto{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }
        // funcion para poder llamar las vistas por medio de query y hace la interaccion con la funcion registro que se encuentra creada en base.php
        public function obtenerProducto(){
            $this->db->query('SELECT * FROM producto');
            $resultados = $this->db->registros();
            return $resultados;
        }

        public function obtenerProveedor(){
            $this->db->query('SELECT * FROM proveedor');
            $resultados = $this->db->registros();
            return $resultados;
        }

        public function agregarProducto($datos){
            $this->db->query('INSERT INTO producto (codigo, descripcion, precio, id_categoria, id_proveedor, stock) VALUES (:codigo, :descripcion, :precio, :id_categoria, :id_proveedor, :stock)');

            //vincula los valores
            $this->db->bind(':codigo', $datos['codigo']);
            $this->db->bind(':descripcion', $datos['descripcion']);
            $this->db->bind(':precio', $datos['precio']);
            $this->db->bind(':id_categoria', $datos['id_categoria']);
            $this->db->bind(':id_proveedor', $datos['id_proveedor']);
            $this->db->bind(':stock', $datos['stock']);

            //ejecutar el query
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function obtenerProductoId($id){
            $this->db->query('SELECT * FROM producto WHERE id_producto = :id');
            $this->db->bind(':id', $id);
            $fila = $this->db->registro();
            return $fila;
        }
        //esta funcion se hace cuando agrego una compra 
        public function actualizarStock($id_producto, $cantidad){
            $this->db->query('UPDATE producto SET stock = stock + :cantidad WHERE id_producto = :id_producto');

            //vinculamos los valores
            $this->db->bind(':cantidad', $cantidad);
            $this->db->bind(':id_producto', $id_producto);

            //ejecutar
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }

        //esta funcion funciona cuando elimino una venta
        public function aumentarStock($id_producto, $cantidad){
            $this->db->query('UPDATE producto SET stock = stock + :cantidad WHERE id_producto = :id_producto');

            //vinculamos los valores
            $this->db->bind(':cantidad', $cantidad);
            $this->db->bind(':id_producto', $id_producto);

            //ejecutar
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }
        //Esta funcion sirve cuando realizo una venta
        public function ventaStock($id_producto, $cantidad){
            $this->db->query('UPDATE producto SET stock = stock - :cantidad WHERE id_producto = :id_producto');

            //vinculamos los valores
            $this->db->bind(':cantidad', $cantidad);
            $this->db->bind(':id_producto', $id_producto);

            //ejecutar
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }

        //Funcion cuando elimino una compra
        public function dismiStock($id_producto, $cantidad){
            $this->db->query('UPDATE producto SET stock = stock - :cantidad WHERE id_producto = :id_producto');

            $this->db->bind('cantidad', $cantidad);
            $this->db->bind(':id_producto', $id_producto);

            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }

       /* public function actualizarCliente($datos){
            $this->db->query('UPDATE cliente SET nombre = :nombre, apellido = :apellido, correo = :correo, telefono = :telefono, fecha_nacimiento = :fecha_nacimiento, genero = :genero, direccion = :direccion, ciudad = :ciudad WHERE id_cliente = :id');

            // se vinculan los valores para poder actializar
            $this->db->bind(':id', $datos['id_cliente']);
            $this->db->bind(':nombre', $datos['nombre']);
            $this->db->bind(':apellido', $datos['apellido']);
            $this->db->bind(':correo', $datos['correo']);
            $this->db->bind(':telefono', $datos['telefono']);
            $this->db->bind(':fecha_nacimiento', $datos['fecha_nacimiento']);
            $this->db->bind(':genero', $datos['genero']);
            $this->db->bind(':direccion', $datos['direccion']);
            $this->db->bind(':ciudad', $datos['ciudad']);

            //ejecutar
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }*/

        public function borrarDepartamento($datos){
            $this->db->query('DELETE FROM departamento WHERE id_departamento = :id');

            // se vinculan los valores para poder actializar
            $this->db->bind(':id', $datos['id_departamento']);

            //ejecutar
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }

         //Obtener productos por departamento
        public function obtenerProductosPorDepartamento($id_departamento){
            $this->db->query('SELECT producto.*, stock_departamento.stock AS stock_departamento FROM producto
                            JOIN stock_departamento ON producto.id_producto = stock_departamento.id_producto
                            WHERE stock_departamento.id_departamento = :id_departamento');
            $this->db->bind(':id_departamento', $id_departamento);
            $resultados = $this->db->registros();
            return $resultados;
        }

        //Codigo para la función del stock por departamento
        public function obtenerStockPorDepartamento($id_producto, $id_departamento) {
            $this->db->query('SELECT stock FROM stock_departamento WHERE id_producto = :id_producto AND id_departamento = :id_departamento');
            $this->db->bind(':id_producto', $id_producto);
            $this->db->bind(':id_departamento', $id_departamento);
            $resultado = $this->db->registro();
            return $resultado ? $resultado->stock : 0;
        }

        //Transferir stock al departamento
        public function transferirStock($id_producto, $id_departamento, $cantidad) {
            $this->db->query('SELECT stock FROM producto WHERE id_producto = :id_producto');
            $this->db->bind(':id_producto', $id_producto);
            $resultado = $this->db->registro();
            $stockDisponible = $resultado ? $resultado->stock : 0;

            if ($cantidad > $stockDisponible) {
                return false;
            }

            //disminuir el stock
            $this->db->query('UPDATE producto SET stock = stock - :cantidad WHERE id_producto = :id_producto');
            $this->db->bind(':cantidad', $cantidad);
            $this->db->bind(':id_producto', $id_producto);
            $this->db->execute();

            // Aumentar stock en el departamento
            $this->db->query('INSERT INTO stock_departamento (id_producto, id_departamento, stock) VALUES (:id_producto, :id_departamento, :cantidad)
            ON DUPLICATE KEY UPDATE stock = stock + :cantidad');
            $this->db->bind(':id_producto', $id_producto);
            $this->db->bind(':id_departamento', $id_departamento);
            $this->db->bind(':cantidad', $cantidad);
            return $this->db->execute();
        }


    }