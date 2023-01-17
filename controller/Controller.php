<?php

class Controller {

    public function carga404() {
        include 'view/admin/error-404.php';
    }
    public function muestraHome() {
        include 'view/admin/home.php';
    }
    public function muestraFicha() {
        include 'view/admin/fichaejemplo.php';
    }
    public function muestraUsuarios() {
        include 'view/admin/usuarios.php';
    }
    public function muestraProductos() {
        include 'view/admin/productos.php';
    }
    public function muestraCategorias() {
        include 'view/admin/categorias.php';
    }
    public function muestraComentarios() {
        include 'view/admin/comentarios.php';
    }    
    /**
     * muestraFichaUsuario
     *
     * @param  int $codUsuario
     * @return void
     */
    public function muestraFichaUsuario(int $codUsuario) {
        $usuario = Usuario::getUsuarioByCod($codUsuario);
        include 'view/admin/fichausuario.php';
    }
    public function muestraFichaCategoria(int $codCategoria) {
        $categorias = Categoria::getAllCategorias();
        $categoria = Categoria::getCategoriaByCod($codCategoria);
        if ($categoria->codCategoriaPadre) {
            $categoriaPadre = Categoria::getCategoriaByCod($categoria->codCategoriaPadre);
        }
        include 'view/admin/fichacategoria.php';
    }
    public function muestraFichaProducto(int $codProducto) {
        $producto = Producto::getProductoByCod($codProducto);
        $categorias = Categoria::getAllCategorias();
        include 'view/admin/fichaproducto.php';
    }
}