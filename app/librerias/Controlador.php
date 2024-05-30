<?php


    //Clase controlador principal


    class Controlador{

        //cargar modelo
        public function modelo($modelo){
            //carga
            require_once '../app/modelos/' . $modelo . '.php';
            //Instanciar el modelo
            return new $modelo();
        }

        //Carga la vista
        public function vista($vista, $datos = []){
            //chequear el archivo vista existe
            if (file_exists('../app/vistas/' . $vista . '.php')){
                require_once '../app/vistas/' . $vista . '.php';
            }else{
                //Si el archivo no existe 
                die('La vista no existe');
            }
        }
    }