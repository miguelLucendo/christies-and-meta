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

    public static function modificaProducto($codProducto, $datos)
    {
        // Gestionamos la imagen para que bd solo tenga que insertar la ruta en la bbdd
        if ($datos['img1']['size'] > 0) {
            $temporal = $datos['img1']['tmp_name'];
            $path = $_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/producto/$codProducto/img1.png";

            if (!is_dir($_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/producto/$codProducto")) {
                mkdir($_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/producto/$codProducto");
            }
            move_uploaded_file($temporal, $path);
            $datos['img1'] = "producto/$codProducto/img1.png";
        } else {
            unset($datos['img1']);
        }

        if ($datos['img2']['size'] > 0) {
            $temporal = $datos['img2']['tmp_name'];
            $path = $_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/producto/$codProducto/img2.png";

            if (!is_dir($_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/producto/$codProducto")) {
                mkdir($_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/producto/$codProducto");
            }
            move_uploaded_file($temporal, $path);
            $datos['img2'] = "producto/$codProducto/img2.png";
        } else {
            unset($datos['img2']);
        }

        if ($datos['img3']['size'] > 0) {
            $temporal = $datos['img3']['tmp_name'];
            $path = $_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/producto/$codProducto/img3.png";

            if (!is_dir($_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/producto/$codProducto")) {
                mkdir($_SERVER['DOCUMENT_ROOT']."/christies-and-meta/view/img/producto/$codProducto");
            }
            move_uploaded_file($temporal, $path);
            $datos['img3'] = "producto/$codProducto/img3.png";
        } else {
            unset($datos['img3']);
        }

        (new BD)->modificaProducto($codProducto, $datos);
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
    public static function getProductosSliderNormal() {
        $productos = (new BD)->getProductosSliderNormal();

        $array = [];

        foreach ($productos as $producto) {
            $arr_aux = [];

            $arr_aux['Nombre'] = $producto['Nombre'];
            $arr_aux['Precio'] = $producto['Precio'];
            $arr_aux['Img1'] = $producto['Img1'];
            $arr_aux['NombreCategoria'] = $producto['NombreCategoria'];

            $array[] = $arr_aux;
        }
        return $array;
    }
    public static function getProductosSliderLogin(int $codUsuario) {
        $productos = (new BD)->getProductosSliderLogin($codUsuario);

        $array = [];

        foreach ($productos as $producto) {
            $arr_aux = [];

            $arr_aux['Nombre'] = $producto['Nombre'];
            $arr_aux['Precio'] = $producto['Precio'];
            $arr_aux['Img1'] = $producto['Img1'];
            $arr_aux['NombreCategoria'] = $producto['NombreCategoria'];

            $array[] = $arr_aux;
        }
        return $array;
    }
    public static function getProductosByName($busqueda) {
        $productos = (new BD)->getProductosByName($busqueda);

        $array = [];

        foreach ($productos as $producto) {
            $arr_aux = [];
            $arr_aux['CodProducto'] = $producto['CodProducto'];
            $arr_aux['Nombre'] = $producto['Nombre'];
            $arr_aux['Descripcion'] = $producto['Descripcion'];
            $arr_aux['Precio'] = $producto['Precio'];
            $arr_aux['PopularidadTotal'] = $producto['PopularidadTotal'];
            $arr_aux['Img1'] = $producto['Img1'];

            $array[] = $arr_aux;
        }

        return $array;
    }
    public static function getProductosByCategoria($busqueda) {
        $productos = (new BD)->getProductosByCategoria($busqueda);

        $array = [];

        foreach ($productos as $producto) {
            $arr_aux = [];
            $arr_aux['CodProducto'] = $producto['CodProducto'];
            $arr_aux['Nombre'] = $producto['Nombre'];
            $arr_aux['Descripcion'] = $producto['Descripcion'];
            $arr_aux['Precio'] = $producto['Precio'];
            $arr_aux['PopularidadTotal'] = $producto['PopularidadTotal'];
            $arr_aux['Img1'] = $producto['Img1'];

            $array[] = $arr_aux;
        }

        return $array;
    }
    public static function getProductosByComentarios($busqueda) {
        $productos = (new BD)->getProductosByComentarios($busqueda);

        $array = [];

        foreach ($productos as $producto) {
            $arr_aux = [];
            $arr_aux['CodProducto'] = $producto['CodProducto'];
            $arr_aux['Nombre'] = $producto['Nombre'];
            $arr_aux['Descripcion'] = $producto['Descripcion'];
            $arr_aux['Precio'] = $producto['Precio'];
            $arr_aux['PopularidadTotal'] = $producto['PopularidadTotal'];
            $arr_aux['Img1'] = $producto['Img1'];

            $array[] = $arr_aux;
        }

        return $array;
    }
}
