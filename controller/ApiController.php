<?php
require_once 'model/Usuario.php';

class ApiController
{

    public function getUsuarioByCod(int $codUsuario)
    {
        echo json_encode((array) Usuario::getUsuarioByCod($codUsuario));
    }
    public function getUsuariosByPage(int $indicePagina) {
        echo json_encode(Usuario::getUsuariosByPage($indicePagina));
    }
}
