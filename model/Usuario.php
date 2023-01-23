<?php

require_once 'bd.php';

/**
 * @author Miguel Lucendo Esteban
 */
class Usuario
{

    public $codUsuario, $email, $contrasenya, $nombre, $apellidos, $moneda, $admin;

    public function __construct(int $codUsuario, string $email, string $contrasenya, string $nombre, string $apellidos, float $moneda, bool $admin)
    {
        $this->codUsuario = $codUsuario;
        $this->email = $email;
        $this->contrasenya = $contrasenya;
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->moneda = $moneda;
        $this->admin = $admin;
    }

    public static function altaUsuario($email, $password, $nombre, $apellidos) {
        (new BD)->altaUsuario($email, $password, $nombre, $apellidos);
    }
    public static function bajaUsuario($codUsuario) {
        // Primero doy de baja los comentarios que escribió ese usuario y quito su id de las compras
        (new BD)->bajaComentariosRelacionados($codUsuario);
        (new BD)->bajaComprasRelacionadas($codUsuario);
        (new BD)->bajaUsuario($codUsuario);
    }
    public static function modificaUsuario($codUsuario, $datos) {
        if (isset($datos['Contrasenya'])) {
            $datos['Contrasenya'] = sha1($datos['Contrasenya']);
        }
        (new BD)->modificaUsuario($codUsuario, $datos);
    }
    /**
     * getUsuarioByCod
     *
     * @param  int $codUsuario
     * @return Usuario
     */
    public static function getUsuarioByCod(int $codUsuario): Usuario
    {
        $usuario = (new BD)->getUsuarioByCod($codUsuario);

        return new Usuario(
            $usuario['CodUsuario'],
            $usuario['Email'],
            $usuario['Contrasenya'],
            $usuario['Nombre'],
            $usuario['Apellidos'],
            $usuario['Moneda'],
            $usuario['Admin']
        );
    }
    public static function getCodByUser($user) {
        $cod = (new BD)->getCodByUser($user);
        return $cod;
    }
    public static function getUsuariosByPage(int $indicePagina)
    {
        $usuarios = (new BD)->getUsuariosByPage($indicePagina);

        $array = [];

        foreach ($usuarios as $usuario) {
            $user = new Usuario(
                $usuario['CodUsuario'],
                $usuario['Email'],
                $usuario['Contrasenya'],
                $usuario['Nombre'],
                $usuario['Apellidos'],
                $usuario['Moneda'],
                $usuario['Admin']
            );
            $array[] = $user;
        }

        return $array;
    }
}
