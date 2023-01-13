<?php


class BD
{

    public $ruta;
    public $user_bbdd;
    public $pass;

    public function __construct()
    {
        $config_json = file_get_contents('config.json');
        $decoded_json = json_decode($config_json, true);

        $this->ruta = $decoded_json['database_url'];
        $this->user_bbdd = $decoded_json['database_user'];
        $this->pass = $decoded_json['database_pass'];
    }


    /**
     * login
     *
     * @param  string $user
     * @param  string $pass
     * @return bool
     */
    public function login(string $user, string $pass): bool
    {
        $db = new PDO($this->ruta, $this->user_bbdd, $this->pass);

        $sql = 'select * from usuario where Email = :user and Contrasenya = sha1(:pass) and Admin = 1';
        $stmt = $db->prepare($sql);

        $stmt->execute(array('user' => $user, 'pass' => $pass));

        if ($stmt->rowCount() === 1) {
            $stmt->closeCursor();
            $db = null;
            return true;
        }
        $stmt->closeCursor();
        $db = null;
        return false;
    }
    public function getUsuarioByCod($codUsuario)
    {
        $db = new PDO($this->ruta, $this->user_bbdd, $this->pass);

        $sql = 'select * from usuario where CodUsuario = :cod';
        $stmt = $db->prepare($sql);

        $stmt->execute(['cod' => $codUsuario]);
        $aux = '';
        foreach ($stmt as $usuario) {
            $aux = $usuario;
            break;
        }
        $stmt->closeCursor();
        $db = null;
        return $aux;
    }
    public function getUsuariosByPage($indicePagina) {
        $db = new PDO($this->ruta, $this->user_bbdd, $this->pass);

        $indicePagina = ($indicePagina * 10) - 10;

        $sql = "select * from usuario limit $indicePagina,10";
        $usuarios = $db->query($sql);

        $db = null;
        return $usuarios;
    }
    public function getProductoByCod($codProducto) {
        $db = new PDO($this->ruta, $this->user_bbdd, $this->pass);

        $sql = 'select p.*, c.Nombre as NombreCategoria from producto as p inner join categoria as c on p.CodCategoria = c.CodCategoria where p.CodProducto = :cod;';

        $stmt = $db->prepare($sql);

        $stmt->execute(['cod' => $codProducto]);
        $aux = '';
        foreach ($stmt as $producto) {
            $aux = $producto;
            break;
        }
        $stmt->closeCursor();
        $db = null;
        return $aux;
    }
    public function getProductosByPage($indicePagina) {
        $db = new PDO($this->ruta, $this->user_bbdd, $this->pass);

        $indicePagina = ($indicePagina * 10) - 10;

        $sql = "select p.*, c.Nombre as NombreCategoria from producto as p inner join categoria as c on p.CodCategoria = c.CodCategoria limit $indicePagina,10";
        $productos = $db->query($sql);

        $db = null;
        return $productos;
    }
    public function getCategoriaByCod($codCategoria) {
        $db = new PDO($this->ruta, $this->user_bbdd, $this->pass);

        $sql = 'select * from categoria where CodCategoria = :cod';

        $stmt = $db->prepare($sql);

        $stmt->execute(['cod' => $codCategoria]);
        $aux = '';
        foreach ($stmt as $categoria) {
            $aux = $categoria;
            break;
        }
        $stmt->closeCursor();
        $db = null;
        return $aux;
    }
    public function getCategoriasByPage($indicePagina) {
        $db = new PDO($this->ruta, $this->user_bbdd, $this->pass);

        $indicePagina = ($indicePagina * 10) - 10;

        $sql = "select * from categoria limit $indicePagina,10";
        $categorias = $db->query($sql);

        $db = null;
        return $categorias;
    }
}
