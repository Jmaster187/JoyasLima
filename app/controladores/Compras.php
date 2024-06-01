<?php

    class Compras extends Controlador{
        public function __construct(){
            redireccionarSiNoEstaLogueado('/paginas/inicio');
            $this->compraModelo = $this->modelo('modelCompra');
            $this->productoModelo = $this->modelo('modelProducto');
            $this->proveedorModelo = $this->modelo('modelProveedor');
            $this->departamentoModelo = $this->modelo('modelDepartamento');
            
        }

        public function index(){
            //Obtener los usuarios
            $compras = $this->compraModelo->obtenerCompra();
            $productos = $this->productoModelo->obtenerProducto();
            $proveedores = $this->productoModelo->obtenerProveedor();
            $datos = [
                'compras' => $compras,
                'productos' => $productos,
                'proveedores' => $proveedores
                
            ];

            $this->vista('/paginas/crudCompras', $datos);
        }

        //metodo para agregar datos 
        public function agregar(){
            $productos = $this->productoModelo->obtenerProducto();
            $proveedores = $this->productoModelo->obtenerProveedor();

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'id_producto' => trim($_POST['id_producto']),
                    'id_proveedor' => trim($_POST['id_proveedor']),
                    'cantidad' => trim($_POST['cantidad']),
                    'precio_total' => trim($_POST['precio_total']),
                    'fecha' => trim($_POST['fecha']),
                    'proveedores' => $proveedores,
                    'productos' => $productos
                ];
            

                if($this->compraModelo->agregarCompra($datos)){
                    $this->productoModelo->actualizarStock($datos['id_producto'], $datos['cantidad']);
                    redireccionar('/Compras');

                }else{
                    die('algo salio mal');
                }
            }else{

                $this->vista('paginas/crudCompra', $datos);
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