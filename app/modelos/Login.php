<?php

    class Login{

        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getUser($datos){
           
            $this->db->query('SELECT * FROM usuario WHERE nombre_usuario = :nombre_usuario AND contraseña = :contrasena;');
            $this->db->bind(':nombre_usuario', $datos['nombre_usuario']);
            $this->db->bind(':contrasena', $datos['contraseña']);
            $row = $this->db->registro();

            if($this->db->rowCount() > 0) {
                return $row;
            }else {
                return false;
            }
            
        }

    }