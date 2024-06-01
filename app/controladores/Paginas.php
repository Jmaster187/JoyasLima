<?php

    class Paginas extends Controlador{
        public function __construct(){
            $this->usuarioModelo = $this->modelo('Usuario');
            $this->loginModelo = $this->modelo('Login');
        }

        public function index(){
            //Obtener los usuarios
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $datos = [

                    'nombre_usuario' => trim($_POST['nombre_usuario']),
                    'contraseña' => trim($_POST['contraseña'])
                ];
                
                $user = $this->loginModelo->getUser($datos);
                
                
                 if ($user){
                    $_SESSION['usuario_id'] = $user->id;
                    $_SESSION['nombre_usuario'] = $user->nombre_usuario;
                     redireccionar('/Menu');
                 }else {
                     $datos['error'] = 'Nombre de usuario o contraseña son incorrectos';
                     $this->vista('/paginas/inicio', $datos);
                 }
            }else{
                $datos = [
                    'nombre_usuario' => '',
                    'contraseña' => ''
                ];

                $this->vista('/paginas/inicio', $datos);

            }
        }

        public function cerrarSesion() {
            session_start();
            session_unset();
            session_destroy();
            redireccionar('/paginas/inicio');
        }

    }