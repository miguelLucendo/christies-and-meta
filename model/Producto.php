<?php

require_once 'bd.php';

/**
 * @author Miguel Lucendo Esteban
 */
class Producto {

    public $codProducto, $nombre, $descripcion, $precio, $img1, $img2, $img3, $longitud, $latitud, $codCategoria;

    public static function getProductoByCod($codProducto): Producto {
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
        );

    }

}