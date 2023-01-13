<?php
require_once 'model/Usuario.php';
require_once 'model/Producto.php';

class ApiController
{

    public function getUsuarioByCod(int $codUsuario)
    {
        echo json_encode((array) Usuario::getUsuarioByCod($codUsuario));
    }
    public function getUsuariosByPage(int $indicePagina) {
        echo json_encode(Usuario::getUsuariosByPage($indicePagina));
    }
    public function getProductoByCod(int $codProducto) {
        echo json_encode((array)Producto::getProductoByCod($codProducto));
    }
    public function getProductosByPage(int $indicePagina) {
        echo json_encode(Producto::getProductosByPage($indicePagina));
    }
}
