<?php

class FrontController {
    public function muestraHome() {
        include 'view/front/index.php';
    }
    public function muestraCategorias() {
        include 'view/front/categorias.php';
    }
    public function muestraProductos() {
        include 'view/front/productos.php';
    }
    public function muestraContacto() {
        include 'view/front/contact.php';
    }
    public function muestraPanelUsuario() {
        $usuario = Usuario::getUsuarioByCod($_SESSION['codUsuario']);
        include 'view/front/panelusuario.php';
    }
}