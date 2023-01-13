<?php

require_once 'bd.php';

/**
 * @author Miguel Lucendo Esteban
 */
class Producto
{

    public $codProducto, $nombre, $descripcion, $precio, $img1, $img2, $img3, $longitud, $latitud, $codCategoria, $nombreCategoria;

    public function __construct($codProducto, $nombre, $descripcion, $precio, $img1, $img2, $img3, $longitud, $latitud, $codCategoria, $nombreCategoria)
    {
        $this->codProducto = $codProducto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->img1 = $img1;
        $this->img2 = $img2;
        $this->img3 = $img3;
        $this->longitud = $longitud;
        $this->latitud = $latitud;
        $this->codCategoria = $codCategoria;
        $this->nombreCategoria = $nombreCategoria;
    }

    public static function getProductoByCod($codProducto): Producto
    {
        $producto = (new BD)->getProductoByCod($codProducto);

        return new Producto(
            $producto['CodProducto'],
            $producto['Nombre'],
            $producto['Descripcion'],
            $producto['Precio'],
            $producto['Img1'],
            $producto['Img2'],
            $producto['Img3'],
            $producto['Longitud'],
            $producto['Latitud'],
            $producto['CodCategoria'],
            $producto['NombreCategoria'],
        );
    }
    public static function getProductosByPage(int $indicePagina)
    {
        $productos = (new BD)->getProductosByPage($indicePagina);

        $array = [];

        foreach ($productos as $producto) {
            $product = new Producto(
                $producto['CodProducto'],
                $producto['Nombre'],
                $producto['Descripcion'],
                $producto['Precio'],
                $producto['Img1'],
                $producto['Img2'],
                $producto['Img3'],
                $producto['Longitud'],
                $producto['Latitud'],
                $producto['CodCategoria'],
                $producto['NombreCategoria'],
            );
            $array[] = $product;
        }

        return $array;
    }
}
