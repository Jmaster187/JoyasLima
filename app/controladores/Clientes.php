<?php

    class Clientes extends Controlador{
        public function __construct(){
            $this->clienteModelo = $this->modelo('modelCliente');
            
        }

        public function index(){
            //Obtener los usuarios
            $clientes = $this->clienteModelo->obtenerClientes();
            $datos = [
                'clientes' => $clientes
            ];

            $this->vista('/paginas/crudCliente', $datos);
        }

        //metodo para agregar datos 
        public function agregar(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'nombre' => trim($_POST['nombre']),
                    'apellido' => trim($_POST['apellido']),
                    'correo' => trim($_POST['correo']),
                    'telefono' => trim($_POST['telefono']),
                    'fecha_nacimiento' => trim($_POST['fecha_nacimiento']),
                    'genero' => trim($_POST['genero']),
                    'direccion' => trim($_POST['direccion']),
                    'ciudad' => trim($_POST['ciudad'])
                    
                ];
            

                if($this->clienteModelo->agregarClientes($datos)){
                    redireccionar('/Clientes');

                }else{
                    die('algo salio mal');
                }
            }else{
                $datos = [
                    'nombre' => '',
                    'email' => '',
                    'telefono' => '',
                ];

                $this->vista('paginas/crudCliente', $datos);
            }
        }

        //metodo para editar datos 
        public function editar($id){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'id_cliente' => $id,
                    'nombre' => trim($_POST['nombre']),
                    'apellido' => trim($_POST['apellido']),
                    'correo' => trim($_POST['correo']),
                    'telefono' => trim($_POST['telefono']),
                    'fecha_nacimiento' => trim($_POST['fecha_nacimiento']),
                    'genero' => trim($_POST['genero']),
                    'direccion' => trim($_POST['direccion']),
                    'ciudad' => trim($_POST['ciudad'])
                ];

                if($this->clienteModelo->actualizarCliente($datos)){
                    redireccionar('/Clientes');
                }else{
                    die('algo salio mal');
                }
            }else{
                //obtenemos los datos de la base de datos
                $cliente = $this->clienteModelo->obtenerClienteId($id);

                $datos = [
                    'id_cliente' => $cliente->id_cliente,
                    'nombre' => $cliente->nombre,
                    'apellido' => $cliente->apellido,
                    'correo' => $cliente->correo,
                    'telefono' => $cliente->telefono,
                    'fecha_nacimiento' => $cliente->fecha_nacimiento,
                    'genero' => $cliente->genero,
                    'direccion' => $cliente->direccion,
                    'ciudad' => $cliente->ciudad
                ];

                $this->vista('paginas/editarCliente', $datos);
            }
        }

        //metodo para eliminar datos 
        public function borrar($id){
            //obtenemos los datos de la base de datos
            $cliente = $this->clienteModelo->obtenerClienteId($id);

            $datos = [
                'id_cliente' => $cliente->id_cliente,
                'nombre' => $cliente->nombre,
                'apellido' => $cliente->apellido,
                'correo' => $cliente->correo,
                'telefono' => $cliente->telefono,
                'fecha_nacimiento' => $cliente->fecha_nacimiento,
                'genero' => $cliente->genero,
                'direccion' => $cliente->direccion,
                'ciudad' => $cliente->ciudad
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'id_cliente' => $id
                ];

                if($this->clienteModelo->borrarCliente($datos)){
                    redireccionar('/clientes');
                }else{
                    die('algo salio mal');
                }
            }

            $this->vista('paginas/borrarCliente', $datos);
        }
    }