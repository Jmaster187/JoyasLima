<?php

    class Productos extends Controlador{
        public function __construct(){
            redireccionarSiNoEstaLogueado('/paginas/inicio');
            $this->productoModelo = $this->modelo('modelProducto');
            $this->proveedorModelo = $this->modelo('modelProveedor');
            $this->categoriaModelo = $this->modelo('modelCategoria');
            $this->departamentoModelo = $this->modelo('modelDepartamento');

            
        }


        //para ver el stock por departamento
        public function verPorDepartamento($id_departamento) {
            $productos = $this->productoModelo->obtenerProductosPorDepartamento($id_departamento);
            $departamento = $this->departamentoModelo->obtenerDepartamentoId($id_departamento);
            $datos = [
                'productos' => $productos,
                'departamento' => $departamento
            ];

            $this->vista('paginas/productosPorDepartamento', $datos);
        }

        //metodo para transferir stock
        public function transferirStock(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $datos = [
                    'id_producto' => trim($_POST['id_producto']),
                    'id_departamento' => trim($_POST['id_departamento']),
                    'cantidad' => trim($_POST['cantidad'])
                ];

                if ($this->productoModelo->transferirStock($datos['id_producto'], $datos['id_departamento'], $datos['cantidad'])) {
                    redireccionar('/productos/verPorDepartamento/' . $datos['id_departamento']);
                } else {
                    $datos['error'] = 'Stock insuficiente en el almacén principal';
                    $this->vista('paginas/transferirStock', $datos);
                }
            } else {
                $productos = $this->productoModelo->obtenerProducto();
                $departamentos = $this->departamentoModelo->obtenerDepartamento();
                $datos = [
                    'id_producto' => '',
                    'id_departamento' => '',
                    'cantidad' => '',
                    'productos' => $productos,
                    'departamentos' => $departamentos,
                    'error' => ''
                ];
    
                $this->vista('paginas/transferirStock', $datos);
            }
            
            }
        

        public function index(){
            //Obtener los usuarios
            $productos = $this->productoModelo->obtenerProducto();
            $proveedores = $this->productoModelo->obtenerProveedor();
            $categorias = $this->categoriaModelo->obtenerCategoria();
            $datos = [
                'productos' => $productos,
                'proveedores' => $proveedores,
                'categorias' => $categorias
                
            ];

            $this->vista('/paginas/crudProducto', $datos);
        }

        //metodo para agregar datos 
        public function agregar(){
            $proveedores = $this->proveedorModelo->obtenerProveedores();
            $categorias = $this->categoriaModelo->obtenerCategoria();

            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $datos = [
                    'codigo' => trim($_POST['codigo']),
                    'descripcion' => trim($_POST['descripcion']),
                    'precio' => trim($_POST['precio']),
                    'id_categoria' => trim($_POST['id_categoria']),
                    'id_proveedor' => trim($_POST['id_proveedor']),
                    'stock' => trim($_POST['stock']),

                    'proveedores' => $proveedores,
                    'categorias' => $categorias
                ];
            

                if($this->productoModelo->agregarProducto($datos)){
                    redireccionar('/Productos');

                }else{
                    die('algo salio mal');
                }
            }else{

                $this->vista('paginas/crudProducto', $datos);
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