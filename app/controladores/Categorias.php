<?php

    class Categorias extends Controlador{
        public function __construct(){
            redireccionarSiNoEstaLogueado('/paginas/inicio');
            $this->categoriaModelo = $this->modelo('modelCategoria');
            
        }

        public function index(){
            //Obtener los usuarios
            $categorias = $this->categoriaModelo->obtenerCategoria();
            $datos = [
                'categorias' => $categorias
            ];

            $this->vista('/paginas/crudCategoria', $datos);
        }

        //metodo para agregar datos 
        public function agregar(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'nombre' => trim($_POST['nombre']),
                    'descripcion' => trim($_POST['descripcion'])
                    
                ];
            

                if($this->categoriaModelo->agregarCategorias($datos)){
                    redireccionar('/Categorias');

                }else{
                    die('algo salio mal');
                }
            }else{
                $datos = [
                    'nombre' => '',
                    'email' => '',
                    'telefono' => '',
                ];

                $this->vista('paginas/crudCategoria', $datos);
            }
        }

        //metodo para editar datos 
       /* public function editar($id){
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
                    redireccionar('/paginas/crudCliente');
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
        }*/

        //metodo para eliminar datos 
        public function borrar($id){
            //obtenemos los datos de la base de datos
            $categoria = $this->categoriaModelo->obtenerCategoriaId($id);

            $datos = [
                'id_categoria' => $categoria->id_categoria,
                'nombre' => $categoria->nombre,
                'descripcion' => $categoria->descripcion
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'id_categoria' => $id
                ];

                if($this->categoriaModelo->borrarCategoria($datos)){
                    redireccionar('/Categorias');
                }else{
                    die('algo salio mal');
                }
            }

            $this->vista('paginas/borrarCategoria', $datos);
        }
    }