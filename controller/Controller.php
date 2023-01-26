<?php

class Controller {

    public function carga404() {
        include 'view/admin/error-404.php';
    }
    public function muestraHome() {
        include 'model/controlback.php';
        $admin = Usuario::getUsuarioByCod($_SESSION['codUsuario']);
        include 'view/admin/home.php';
    }
    public function muestraFicha() {
        include 'view/admin/fichaejemplo.php';
    }
    public function muestraUsuarios() {
        include 'model/controlback.php';
        include 'view/admin/usuarios.php';
    }
    public function muestraProductos() {
        include 'model/controlback.php';
        include 'view/admin/productos.php';
    }
    public function muestraCategorias() {
        include 'model/controlback.php';
        include 'view/admin/categorias.php';
    }
    public function muestraComentarios() {
        include 'model/controlback.php';
        include 'view/admin/comentarios.php';
    }    
    /**
     * muestraFichaUsuario
     *
     * @param  int $codUsuario
     * @return void
     */
    public function muestraFichaUsuario(int $codUsuario) {
        include 'model/controlback.php';
        $usuario = Usuario::getUsuarioByCod($codUsuario);
        include 'view/admin/fichausuario.php';
    }
    public function muestraFichaCategoria(int $codCategoria) {
        include 'model/controlback.php';
        $categorias = Categoria::getAllCategorias();
        $categoria = Categoria::getCategoriaByCod($codCategoria);
        if ($categoria->codCategoriaPadre) {
            $categoriaPadre = Categoria::getCategoriaByCod($categoria->codCategoriaPadre);
        }
        include 'view/admin/fichacategoria.php';
    }
    public function muestraFichaCategoriaNueva() {
        include 'model/controlback.php';
        $categorias = Categoria::getAllCategorias();
        $categoria = new Categoria(
            0, '', '', '', 0
        );
        include 'view/admin/fichacategoria.php';
    }
    public function muestraFichaProducto(int $codProducto) {
        include 'model/controlback.php';
        $producto = Producto::getProductoByCod($codProducto);
        $categorias = Categoria::getAllCategorias();
        include 'view/admin/fichaproducto.php';
    }
}