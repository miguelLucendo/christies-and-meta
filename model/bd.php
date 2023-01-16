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

        $sql = "select * from usuario order by CodUsuario ASC limit $indicePagina,10";
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

        $sql = "select p.*, c.Nombre as NombreCategoria from producto as p inner join categoria as c on p.CodCategoria = c.CodCategoria order by CodProducto ASC limit $indicePagina,10";
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

        $sql = "select * from categoria order by CodCategoria ASC limit $indicePagina,10";
        $categorias = $db->query($sql);

        $db = null;
        return $categorias;
    }
    public function getComentarioByCod($codComentario) {
        $db = new PDO($this->ruta, $this->user_bbdd, $this->pass);

        $sql = 'select * from comentario where CodComentario = :cod';

        $stmt = $db->prepare($sql);

        $stmt->execute(['cod' => $codComentario]);
        $aux = '';
        foreach ($stmt as $comentario) {
            $aux = $comentario;
            break;
        }
        $stmt->closeCursor();
        $db = null;
        return $aux;
    }
    public function getComentariosByPage($indicePagina) {
        $db = new PDO($this->ruta, $this->user_bbdd, $this->pass);

        $indicePagina = ($indicePagina * 10) - 10;

        $sql = "select c.*, u.Email, p.Nombre from comentario c inner join usuario u on c.CodUsuario = u.CodUsuario"
        ." inner join producto p on c.CodProducto = p.CodProducto order by CodComentario ASC limit $indicePagina,10";
        $comentarios = $db->query($sql);

        $db = null;
        return $comentarios;
    }
}
