<?php
    // este codigo es para hacer interaccion con la base de datos
    class modelVenta{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }
        // funcion para poder llamar las vistas por medio de query y hace la interaccion con la funcion registro que se encuentra creada en base.php
        public function obtenerVenta(){
            $this->db->query('SELECT 
            venta.id_venta,
            cliente.nombre AS nombre_cliente,
            producto.codigo AS codigo_producto,
            venta.cantidad,
            venta.precio_total,
            venta.fecha
        FROM 
            venta
        JOIN 
            cliente ON venta.id_cliente = cliente.id_cliente
        JOIN 
            producto ON venta.id_producto = producto.id_producto;');
            $resultados = $this->db->registros();
            return $resultados;
        }

        public function agregarVenta($datos){
            $this->db->query('INSERT INTO venta (id_cliente, id_producto, cantidad, precio_total, fecha) VALUES (:id_cliente, :id_producto, :cantidad, :precio_total, :fecha)');

            //vincula los valores
            $this->db->bind(':id_cliente', $datos['id_cliente']);
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

        public function obtenerVentaId($id){
            $this->db->query('SELECT * FROM venta WHERE id_venta = :id');
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

        public function borrarVenta($datos){
            $this->db->query('DELETE FROM venta WHERE id_venta = :id');

            // se vinculan los valores para poder actializar
            $this->db->bind(':id', $datos['id_venta']);

            //ejecutar
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }


    }