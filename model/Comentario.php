<?php

require_once 'bd.php';

/**
 * @author Miguel Lucendo Esteban
 */
class Comentario
{

    public $codComentario, $codUsuario, $codProducto, $texto, $fecha, $nombreUsuario, $nombreProducto;

    public function __construct($codComentario, $codUsuario, $codProducto, $texto, $fecha, $nombreUsuario, $nombreProducto)
    {
        $this->codComentario = $codComentario;
        $this->codUsuario = $codUsuario;
        $this->codProducto = $codProducto;
        $this->texto = $texto;
        $this->fecha = $fecha;
        $this->nombreUsuario = $nombreUsuario;
        $this->nombreProducto = $nombreProducto;
    }

    public static function altaComentario($datos) {
        (new BD)->altaComentario($datos);
    }
    public static function getComentarioByCod($codComentario): Comentario
    {
        $comentario = (new BD)->getComentarioByCod($codComentario);

        return new Comentario(
            $comentario['CodComentario'],
            $comentario['CodUsuario'],
            $comentario['CodProducto'],
            $comentario['Texto'],
            $comentario['Fecha'],
            $comentario['Email'],
            $comentario['Nombre'],
        );
    }

    public static function getComentariosByPage(int $indicePagina)
    {
        $comentarios = (new BD)->getComentariosByPage($indicePagina);

        $array = [];

        foreach ($comentarios as $comentario) {
            $comentario_aux = new Comentario(
                $comentario['CodComentario'],
                $comentario['CodUsuario'],
                $comentario['CodProducto'],
                $comentario['Texto'],
                $comentario['Fecha'],
                $comentario['Email'],
                $comentario['Nombre'],
            );
            $array[] = $comentario_aux;
        }

        return $array;
    }
}
