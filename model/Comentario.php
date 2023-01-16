<?php

require_once 'bd.php';

/**
 * @author Miguel Lucendo Esteban
 */
class Comentario
{

    public $codComentario, $codUsuario, $codProducto, $texto, $fecha;

    public function __construct($codComentario, $codUsuario, $codProducto, $texto, $fecha)
    {
        $this->codComentario = $codComentario;
        $this->codUsuario = $codUsuario;
        $this->codProducto = $codProducto;
        $this->texto = $texto;
        $this->fecha = $fecha;
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
            );
            $array[] = $comentario_aux;
        }

        return $array;
    }
}
