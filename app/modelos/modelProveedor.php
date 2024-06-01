<?php
    // este codigo es para hacer interaccion con la base de datos
    class modelProveedor{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }
        // funcion para poder llamar las vistas por medio de query y hace la interaccion con la funcion registro que se encuentra creada en base.php
        public function obtenerProveedores(){
            $this->db->query('SELECT * FROM proveedor;');
            $resultados = $this->db->registros();
            return $resultados;
        }

        public function agregarProveedores($datos){
            $this->db->query('INSERT INTO proveedor (nombre, correo, telefono, direccion) VALUES (:nombre, :correo, :telefono, :direccion)');

            //vincula los valores
            $this->db->bind(':nombre', $datos['nombre']);
            $this->db->bind(':correo', $datos['correo']);
            $this->db->bind(':telefono', $datos['telefono']);
            $this->db->bind(':direccion', $datos['direccion']);
    
            //ejecutar el query
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function obtenerProveedorId($id){
            $this->db->query('SELECT * FROM proveedor WHERE id_proveedor = :id');
            $this->db->bind(':id', $id);
            $fila = $this->db->registro();
            return $fila;
        }

        public function actualizarProveedor($datos){
            $this->db->query('UPDATE proveedor SET nombre = :nombre, correo = :correo, telefono = :telefono, direccion = :direccion WHERE id_proveedor = :id');

            // se vinculan los valores para poder actializar
            $this->db->bind(':id', $datos['id_proveedor']);
            $this->db->bind(':nombre', $datos['nombre']);
            $this->db->bind(':correo', $datos['correo']);
            $this->db->bind(':telefono', $datos['telefono']);
            $this->db->bind(':direccion', $datos['direccion']);

            //ejecutar
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }

        public function borrarProveedor($datos){
            $this->db->query('DELETE FROM proveedor WHERE id_proveedor = :id');

            // se vinculan los valores para poder actializar
            $this->db->bind(':id', $datos['id_proveedor']);

            try {

                //ejecutar
                if($this->db->execute()){
                    return true;
                }else {
                    return false;
                }
            } catch (PDOException $e) {
                if ($e->getCode() == '23000') {
                    return 'No se puede borrar porque tiene compras añadidas';
                } else {
                    throw $e;
                }
            }
        }


    }