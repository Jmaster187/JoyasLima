<?php
    // este codigo es para hacer interaccion con la base de datos
    class modelCliente{
        private $db;

        public function __construct(){
            $this->db = new Base;
        }
        // funcion para poder llamar las vistas por medio de query y hace la interaccion con la funcion registro que se encuentra creada en base.php
        public function obtenerClientes(){
            $this->db->query('SELECT * FROM cliente');
            $resultados = $this->db->registros();
            return $resultados;
        }

        public function agregarClientes($datos){
            $this->db->query('INSERT INTO cliente (nombre, apellido, correo, telefono, fecha_nacimiento, genero, direccion, ciudad) VALUES (:nombre, :apellido, :correo, :telefono, :fecha_nacimiento, :genero, :direccion, :ciudad)');

            //vincula los valores
            $this->db->bind(':nombre', $datos['nombre']);
            $this->db->bind(':apellido', $datos['apellido']);
            $this->db->bind(':correo', $datos['correo']);
            $this->db->bind(':telefono', $datos['telefono']);
            $this->db->bind(':fecha_nacimiento', $datos['fecha_nacimiento']);
            $this->db->bind(':genero', $datos['genero']);
            $this->db->bind(':direccion', $datos['direccion']);
            $this->db->bind(':ciudad', $datos['ciudad']);

            //ejecutar el query
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function obtenerClienteId($id){
            $this->db->query('SELECT * FROM cliente WHERE id_cliente = :id');
            $this->db->bind(':id', $id);
            $fila = $this->db->registro();
            return $fila;
        }

        public function actualizarCliente($datos){
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
        }

        public function borrarCliente($datos){
            $this->db->query('DELETE FROM cliente WHERE id_cliente = :id');

            // se vinculan los valores para poder actializar
            $this->db->bind(':id', $datos['id_cliente']);

            //ejecutar
            if($this->db->execute()){
                return true;
            }else {
                return false;
            }
        }


    }