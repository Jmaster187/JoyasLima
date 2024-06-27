<?php
    // este codigo es para hacer interaccion con la base de datos
    class modelCompra{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }
        // funcion para poder llamar las vistas por medio de query y hace la interaccion con la funcion registro que se encuentra creada en base.php
        public function obtenerCompra(){
            $this->db->query('SELECT 
            proveedor.nombre AS nombre_proveedor,
            producto.codigo AS codigo_producto,
            compra.cantidad,
            compra.precio_total,
            compra.fecha,
            compra.id_compra
        FROM 
            compra
        JOIN 
            proveedor ON compra.id_proveedor = proveedor.id_proveedor
        JOIN 
            producto ON compra.id_producto = producto.id_producto;');
            $resultados = $this->db->registros();
            return $resultados;
        }

        public function agregarCompra($datos){
            $this->db->query('INSERT INTO compra (id_proveedor, id_producto, cantidad, precio_total, fecha) VALUES (:id_proveedor, :id_producto, :cantidad, :precio_total, :fecha)');

            //vincula los valores
            $this->db->bind(':id_proveedor', $datos['id_proveedor']);
            $this->db->bind(':id_producto', $datos['id_producto']);
            $this->db->bind(':cantidad', $datos['cantidad']);
            $this->db->bind(':precio_total', $datos['precio_total']);
            $this->db->bind(':fecha', $datos['fecha']);

            //ejecutar el query
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function obtenerCompraId($id){
            $this->db->query('SELECT * FROM compra WHERE id_compra = :id');
            $this->db->bind(':id', $id);
            $fila = $this->db->registro();
            return $fila;
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

        public function borrarCompra($datos){
            $this->db->query('DELETE FROM compra WHERE id_compra = :id');

            // se vinculan los valores para poder actializar
            $this->db->bind(':id', $datos['id_compra']);

            //ejecutar
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }


    }