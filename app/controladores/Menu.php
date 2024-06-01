<?php

    class Menu extends Controlador{
        public function __construct(){
            redireccionarSiNoEstaLogueado('/paginas/inicio');
            $this->usuarioModelo = $this->modelo('Usuario');
        }

        public function index(){
            $this->vista('paginas/vistaMenu');
        }

        

    }