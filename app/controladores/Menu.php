<?php

    class Menu extends Controlador{
        public function __construct(){
            $this->usuarioModelo = $this->modelo('Usuario');
            $this->vista('paginas/vistaMenu');
        }

        public function index(){
            $this->vista('paginas/vistaMenu');
        }

        

    }