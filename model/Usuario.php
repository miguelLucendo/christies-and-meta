<?php 

require_once 'bd.php';

/**
 * @author Miguel Lucendo Esteban
 */
class Usuario {

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
    
    /**
     * getUsuarioByCod
     *
     * @param  int $codUsuario
     * @return Usuario
     */
    public static function getUsuarioByCod(int $codUsuario): Usuario {
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

}