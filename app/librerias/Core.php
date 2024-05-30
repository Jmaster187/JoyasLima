<?php

    class Core{
        protected $controladorActual = 'paginas';
        protected $metodoActual = 'index';
        protected $parametros = [];

        public function __construct(){
            $url = $this->getUrl();

            if ($url != null && isset($url[0]) && file_exists('../app/controladores/' .ucwords($url[0]).'.php')) {

                if (file_exists('../app/controladores/' .ucwords($url[0]).'.php')) {
                    //si exite se setea como controlador 
                    $this->controladorActual = ucwords($url[0]);


                    // unset indice
                    unset($url[0]);
                }
            }
            //requerir o llamar el controlador
            require_once '../app/controladores/' . $this->controladorActual . '.php';
            $this->controladorActual = new $this->controladorActual;

            //chequear la segunda parte de la url que seria el método
            if (isset($url[1])) {
                if(method_exists($this->controladorActual, $url[1])) {
                    //Se verifica el metodo
                    $this->metodoActual = $url[1];
                    // unset indice
                    unset($url[1]);
                }
            }
            //echo $this->metodoActual;

            //Obtener los parametros
            $this->parametros = $url ? array_values($url) : [];

            //llamar al callback con parametroa array
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        }

        public function getUrl(){
            //echo $_GET['url'];
            
            if (isset($_GET['url'])) {
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }