<?php

class Controller {

    public function carga404() {
        include 'view/admin/error-404.php';
    }
    public function muestraHome() {
        include 'view/admin/home.php';
    }
    public function muestraListado() {
        include 'view/admin/listadoejemplo.php';
    }
    public function muestraFicha() {
        include 'view/admin/fichaejemplo.php';
    }
    public function muestraUsuarios() {
        include 'view/admin/usuarios.php';
    }
}