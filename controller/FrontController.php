<?php

class FrontController {
    public function muestraHome() {
        include 'view/front/index.php';
    }
    public function muestraCategorias() {
        include 'view/front/categorias.php';
    }
}