<?php

    class Productos extends Controlador{
        public function __construct(){
            $this->productoModelo = $this->modelo('modelProducto');
            $this->proveedorModelo = $this->modelo('modelProveedor');
            
        }

        public function index(){
            //Obtener los usuarios
            $productos = $this->productoModelo->obtenerProducto();
            $datos = [
                'productos' => $productos
            ];

            $this->vista('/paginas/crudProducto', $datos);
        }

        public function mostrarProveedor(){
            $proveedores = $this->productoModelo->obtenerProveedor();
            $datos = [
                'proveedores' => $proveedores
            ];

            $this->vista('/paginas/crudProducto', $datos);
        }

        //metodo para agregar datos 
        public function agregar(){
            //$proveedores = $this->productoModelo->obtenerProveedor();
            $proveedores = $this->proveedorModelo->obtenerProveedorId($id);
            echo '<pre>';
                print_r($proveedores);
            echo '</pre>';
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $proveedores = $this->productoModelo->obtenerProveedor();
                $datos = [
                    'codigo' => trim($_POST['codigo']),
                    'descripcion' => trim($_POST['descripcion']),
                    'precio' => trim($_POST['precio']),
                    'id_categoria' => trim($_POST['id_categoria']),
                    'id_proveedor' => trim($_POST['id_proveedor']),
                    'proveedores' => $proveedores,
                    'id_proveedor' => $proveedores->id_proveedor
                    
                ];
            

                if($this->productoModelo->agregarproductos($datos)){
                    redireccionar('/Productos');

                }else{
                    die('algo salio mal');
                }
            }else{

                $this->vista('paginas/crudProducto', $datos);
            }
            $this->vista('/paginas/crudProducto', $datos);
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
            $departamento = $this->departamentoModelo->obtenerDepartamentoId($id);

            $datos = [
                'id_departamento' => $departamento->id_departamento,
                'nombre' => $departamento->nombre,
                'descripcion' => $departamento->descripcion
            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'id_departamento' => $id
                ];

                if($this->departamentoModelo->borrarDepartamento($datos)){
                    redireccionar('/Departamentos');
                }else{
                    die('algo salio mal');
                }
            }

            $this->vista('paginas/borrarDepartamento', $datos);
        }
    }