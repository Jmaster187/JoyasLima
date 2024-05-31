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
            $this->db->query('INSERT INTO producto (codigo, descripcion, precio, id_categoria, id_proveedor) VALUES (:codigo, :descripcion, :precio, :id_categoria, :id_proveedor)');

            //vincula los valores
            $this->db->bind(':codigo', $datos['codigo']);
            $this->db->bind(':descripcion', $datos['descripcion']);
            $this->db->bind(':precio', $datos['precio']);
            $this->db->bind(':id_categoria', $datos['id_categoria']);
            $this->db->bind(':id_proveedor', $datos['id_proveedor']);

            //ejecutar el query
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function obtenerDepartamentoId($id){
            $this->db->query('SELECT * FROM departamento WHERE id_departamento = :id');
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


    }