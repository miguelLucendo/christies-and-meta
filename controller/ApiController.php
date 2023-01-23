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
    public function modificaCategoria(int $codCategoria)
    {
        $mega = 1024 * 1024;
        $imagen = $_FILES['imagen'];
        $_POST['imagen'] = $imagen;
        Categoria::modificaCategoria($codCategoria, $_POST);

        $config_json = file_get_contents('config.json');
        $decoded_json = json_decode($config_json, true);
        $project_url = $decoded_json['project_url'];

        header("location: $project_url" . "index.php/admin/categoria/$codCategoria");
    }
    public function modificaProducto(int $codProducto)
    {
        $img1 = $_FILES['img1'];
        $_POST['img1'] = $img1;
        $img2 = $_FILES['img2'];
        $_POST['img2'] = $img2;
        $img3 = $_FILES['img3'];
        $_POST['img3'] = $img3;
        Producto::modificaProducto($codProducto, $_POST);

        $config_json = file_get_contents('config.json');
        $decoded_json = json_decode($config_json, true);
        $project_url = $decoded_json['project_url'];

        header("location: $project_url" . "index.php/admin/producto/$codProducto");
    }
    public function bajaUsuario(int $codUsuario)
    {
        Usuario::bajaUsuario($codUsuario);
    }
    public function getCategoriasByFiltro(string $filtro)
    {
        switch ($filtro) {
            case 'nombre':
                $resultado = Categoria::getCategoriasByName($_POST['busqueda']);
                break;
            case 'descripcion':
                // $resultado = Categoria::getCategoriasByDescripcion($filtro, $_POST['busqueda']);
                break;
            case 'puntuacion':
                // $resultado = Categoria::getCategoriasByPuntuacion($filtro, $_POST['busqueda']);
                break;
        }
        echo json_encode($resultado);
    }
}
