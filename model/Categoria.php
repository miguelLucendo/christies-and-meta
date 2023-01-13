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
}
