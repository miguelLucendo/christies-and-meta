<?php

require_once 'bd.php';

class Categoria
{

    public $codCategoria, $nombre, $descripcion, $imagen, $codCategoriaPadre;

    public function __construct($codCategoria, $nombre, $descripcion, $imagen, $codCategoriaPadre)
    {
        $this->codCategoria = $codCategoria;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->codCategoriaPadre = $codCategoriaPadre;
    }

    public static function altaCategoria($datos) {
        $codCategoria = (new BD)->altaCategoria($datos);
        Categoria::modificaCategoria($codCategoria, ['imagen'=>"categoria/$codCategoria/img.png"]);
        Categoria::guardaImagen($codCategoria, $_FILES['imagen']);
    }
    public static function modificaCategoria($codCategoria, $datos)
    {
        // Gestionamos la imagen para que bd solo tenga que insertar la ruta en la bbdd
        if ($datos['imagen']['size'] > 0) {
            $temporal = $datos['imagen']['tmp_name'];
            $path = $_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/categoria/$codCategoria/img.png";

            if (!is_dir($_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/categoria/$codCategoria")) {
                mkdir($_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/categoria/$codCategoria");
            }
            move_uploaded_file($temporal, $path);
            $datos['imagen'] = "categoria/$codCategoria/img.png";
        } else {
            unset($datos['imagen']);
        }
        (new BD)->modificaCategoria($codCategoria, $datos);
    }

    public static function getCategoriaByCod($codCategoria): Categoria
    {
        $categoria = (new BD)->getCategoriaByCod($codCategoria);

        return new Categoria(
            $categoria['CodCategoria'],
            $categoria['Nombre'],
            $categoria['Descripcion'],
            $categoria['Imagen'],
            $categoria['CodCategoriaPadre'],
        );
    }
    public static function getCategoriasByPage(int $indicePagina)
    {
        $categorias = (new BD)->getCategoriasByPage($indicePagina);

        $array = [];

        foreach ($categorias as $categoria) {
            $categoria = new Categoria(
                $categoria['CodCategoria'],
                $categoria['Nombre'],
                $categoria['Descripcion'],
                $categoria['Imagen'],
                $categoria['CodCategoriaPadre'],
            );
            $array[] = $categoria;
        }

        return $array;
    }
    public static function getAllCategorias()
    {
        $categorias = (new BD)->getAllCategorias();

        $array = [];

        foreach ($categorias as $categoria) {
            $categoria = new Categoria(
                $categoria['CodCategoria'],
                $categoria['Nombre'],
                $categoria['Descripcion'],
                $categoria['Imagen'],
                $categoria['CodCategoriaPadre'],
            );
            $array[] = $categoria;
        }

        return $array;
    }
    public static function getCategoriasByName($busqueda) {
        $categorias = (new BD)->getCategoriasByName($busqueda);

        $array = [];

        foreach ($categorias as $categoria) {
            $arr_aux = [];
            $arr_aux['CodCategoria'] = $categoria['CodCategoria'];
            $arr_aux['Nombre'] = $categoria['Nombre'];
            $arr_aux['Descripcion'] = $categoria['Descripcion'];
            $arr_aux['Imagen'] = $categoria['Imagen'];
            $arr_aux['NombreCategoriaPadre'] = $categoria['NombreCategoriaPadre'];

            $array[] = $arr_aux;
        }

        return $array;
    }
    public static function getCategoriasByDescripcion($busqueda) {
        $categorias = (new BD)->getCategoriasByDescripcion($busqueda);

        $array = [];

        foreach ($categorias as $categoria) {
            $arr_aux = [];
            $arr_aux['CodCategoria'] = $categoria['CodCategoria'];
            $arr_aux['Nombre'] = $categoria['Nombre'];
            $arr_aux['Descripcion'] = $categoria['Descripcion'];
            $arr_aux['Imagen'] = $categoria['Imagen'];
            $arr_aux['NombreCategoriaPadre'] = $categoria['NombreCategoriaPadre'];

            $array[] = $arr_aux;
        }

        return $array;
    }
    public static function getCategoriasByPuntuacion($busqueda) {
        $categorias = (new BD)->getCategoriasByPuntuacion($busqueda);

        $array = [];

        foreach ($categorias as $categoria) {
            $arr_aux = [];
            $arr_aux['CodCategoria'] = $categoria['CodCategoria'];
            $arr_aux['Nombre'] = $categoria['Nombre'];
            $arr_aux['Descripcion'] = $categoria['Descripcion'];
            $arr_aux['Imagen'] = $categoria['Imagen'];
            $arr_aux['NombreCategoriaPadre'] = $categoria['NombreCategoriaPadre'];

            $array[] = $arr_aux;
        }

        return $array;
    }
    // imagen
    public static function guardaImagen($codCategoria, $imagen) {
        if ($imagen['size'] > 0) {
            $temporal = $imagen['tmp_name'];
            $path = $_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/categoria/$codCategoria/img.png";

            if (!is_dir($_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/categoria/$codCategoria")) {
                mkdir($_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/categoria/$codCategoria");
            }
            move_uploaded_file($temporal, $path);
        }
    }
}
