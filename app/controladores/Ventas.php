<?php

    class Ventas extends Controlador{
        public function __construct(){
            redireccionarSiNoEstaLogueado('/paginas/inicio');
            $this->ventaModelo = $this->modelo('modelVenta');
            $this->productoModelo = $this->modelo('modelProducto');
            $this->clienteModelo = $this->modelo('modelCliente');
            
        }

        public function index(){
            //Obtener los usuarios
            $ventas = $this->ventaModelo->obtenerVenta();
            $productos = $this->productoModelo->obtenerProducto();
            $clientes = $this->clienteModelo->obtenerClientes();
            $datos = [
                'ventas' => $ventas,
                'productos' => $productos,
                'clientes' => $clientes 
                
            ];

            $this->vista('/paginas/crudVenta', $datos);
        }

        //metodo para agregar datos 
        public function agregar(){
            $productos = $this->productoModelo->obtenerProducto();
            $clientes = $this->clienteModelo->obtenerClientes();

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'id_producto' => trim($_POST['id_producto']),
                    'id_cliente' => trim($_POST['id_cliente']),
                    'cantidad' => trim($_POST['cantidad']),
                    'precio_total' => trim($_POST['precio_total']),
                    'fecha' => trim($_POST['fecha']),
                    'clientes' => $clientes,
                    'productos' => $productos
                ];
            

                if($this->ventaModelo->agregarVenta($datos)){
                    $this->productoModelo->ventaStock($datos['id_producto'], $datos['cantidad']);
                    redireccionar('/Ventas');

                }else{
                    die('algo salio mal');
                }
            }else{

                $this->vista('paginas/crudVenta', $datos);
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
            $ventas = $this->ventaModelo->obtenerVentaId($id);
            $productos = $this->productoModelo->obtenerProductoId($ventas->id_producto);
            $clientes = $this->clienteModelo->obtenerClienteId($ventas->id_cliente);

            $datos = [
                
                'id_venta' => $ventas->id_venta,
                'nombre' => $clientes->nombre,
                'cantidad' => $ventas->cantidad,
                'codigo' => $productos->codigo,
                'id_producto' => $ventas->id_producto

            ];

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'id_venta' => $id,
                    'id_producto' => trim($_POST['id_producto']),
                    'cantidad' => trim($_POST['cantidad'])
                ];

                if($this->ventaModelo->borrarVenta($datos)){
                    $this->productoModelo->aumentarStock($datos['id_producto'], $datos['cantidad']);
                    redireccionar('/Ventas');
                }else{
                    die('algo salio mal');
                }
            }

            $this->vista('paginas/borrarVenta', $datos);
        }
    }