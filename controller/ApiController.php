<?php
require_once 'model/Usuario.php';
require_once 'model/Producto.php';
require_once 'model/Categoria.php';
require_once 'model/Comentario.php';

class ApiController
{

    public function getUsuarioByCod(int $codUsuario)
    {
        echo json_encode((array) Usuario::getUsuarioByCod($codUsuario));
    }
    public function getUsuariosByPage(int $indicePagina)
    {
        echo json_encode(Usuario::getUsuariosByPage($indicePagina));
    }
    public function getProductoByCod(int $codProducto)
    {
        echo json_encode((array)Producto::getProductoByCod($codProducto));
    }
    public function getProductosByPage(int $indicePagina)
    {
        echo json_encode(Producto::getProductosByPage($indicePagina));
    }
    public function getCategoriaByCod(int $codCategoria)
    {
        echo json_encode((array)Categoria::getCategoriaByCod($codCategoria));
    }
    public function getCategoriasByPage(int $indicePagina)
    {
        echo json_encode(Categoria::getCategoriasByPage($indicePagina));
    }
    public function getComentarioByCod(int $codComentario)
    {
        echo json_encode((array)Comentario::getComentarioByCod($codComentario));
    }
    public function getComentariosByPage(int $indicePagina)
    {
        echo json_encode(Comentario::getComentariosByPage($indicePagina));
    }

    //
    public function modificaUsuario(int $codUsuario)
    {
        Usuario::modificaUsuario($codUsuario, $_POST);

        $config_json = file_get_contents('config.json');
        $decoded_json = json_decode($config_json, true);
        $project_url = $decoded_json['project_url'];

        header("location: $project_url" . "index.php/admin/usuario/$codUsuario");
    }
}
