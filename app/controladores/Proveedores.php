<?php

    class Proveedores extends Controlador{
        public function __construct(){
            $this->proveedorModelo = $this->modelo('modelProveedor');
            
        }

        public function index(){
            //Obtener los usuarios
            $proveedores = $this->proveedorModelo->obtenerProveedores();
            $datos = [
                'proveedores' => $proveedores
            ];

            $this->vista('/paginas/crudProveedor', $datos);
        }

        //metodo para agregar datos 
        public function agregar(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'nombre' => trim($_POST['nombre']),
                    'correo' => trim($_POST['correo']),
                    'telefono' => trim($_POST['telefono']),
                    'direccion' => trim($_POST['direccion']),
                    
                ];
            

                if($this->proveedorModelo->agregarProveedores($datos)){
                    redireccionar('/Proveedores');

                }else{
                    die('algo salio mal');
                }
            }else{
                $datos = [
                    'nombre' => '',
                    'correo' => '',
                    'telefono' => '',
                    'direccion' => '',
                ];

                $this->vista('paginas/crudProveedor', $datos);
            }
        }

        //metodo para editar datos 
        public function editar($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'id_proveedor' => $id,
                    'nombre' => trim($_POST['nombre']),
                    'correo' => trim($_POST['correo']),
                    'telefono' => trim($_POST['telefono']),
                    'direccion' => trim($_POST['direccion']),
                ];

                if($this->proveedorModelo->actualizarProveedor($datos)){
                    redireccionar('/Proveedores');
                }else{
                    die('algo salio mal');
                }
            }else{
                //obtenemos los datos de la base de datos
                $proveedor = $this->proveedorModelo->obtenerProveedorId($id);

                $datos = [
                    'id_proveedor' => $proveedor->id_proveedor,
                    'nombre' => $proveedor->nombre,
                    'correo' => $proveedor->correo,
                    'telefono' => $proveedor->telefono,
                    'direccion' => $proveedor->direccion
                ];

                $this->vista('paginas/editarProveedor', $datos);
            }
        }

        //metodo para eliminar datos 
        public function borrar($id){
            //obtenemos los datos de la base de datos
            $proveedor = $this->proveedorModelo->obtenerProveedorId($id);

            $datos = [
                'id_proveedor' => $proveedor->id_proveedor,
                'nombre' => $proveedor->nombre,
                'correo' => $proveedor->correo,
                'telefono' => $proveedor->telefono,
                'direccion' => $proveedor->direccion
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'id_proveedor' => $id
                ];

                if($this->proveedorModelo->borrarProveedor($datos)){
                    redireccionar('/Proveedores');
                }else{
                    die('algo salio mal');
                }
            }

            $this->vista('paginas/borrarProveedor', $datos);
        }
    }