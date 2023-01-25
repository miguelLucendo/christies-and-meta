<?php
// inicio la sesion aqui para que este iniciada cada vez que se entra al sitio web
session_start();
// requires
require_once 'controller/AuthController.php';
require_once 'controller/Controller.php';
require_once 'controller/ApiController.php';
require_once 'controller/FrontController.php';

//Ruta de la home
$config_json = file_get_contents('config.json');
$decoded_json = json_decode($config_json, true);
$home = $decoded_json['page_url'];
//Quito la home de la ruta de la barra de direcciones
$ruta = str_replace($home, "", $_SERVER["REQUEST_URI"]);

//Creo el array de ruta (filtrando los vacíos)
$array_ruta = array_filter(explode("/", $ruta));

//Decido la ruta en función de los elementos del array
// Quiere entrar al backend de la aplicación
if (isset($array_ruta[0]) && $array_ruta[0] == "admin") {
    if (isset($array_ruta[1]) && $array_ruta[1] == 'login' && !isset($array_ruta[2])) {
        $ac = new AuthController;
        $ac->backendLogin();
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'login' && isset($array_ruta[2]) && $array_ruta[2] == 'process') {
        $ac = new AuthController;
        $ac->processBackendLogin();
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'resetpassword') {
        $ac = new AuthController;
        $ac->backendResetPassword();
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'home') {
        $c = new Controller;
        $c->muestraHome();
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'usuarios') {
        $c = new Controller;
        $c->muestraUsuarios();
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'productos') {
        $c = new Controller;
        $c->muestraProductos();
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'categorias') {
        $c = new Controller;
        $c->muestraCategorias();
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'comentarios') {
        $c = new Controller;
        $c->muestraComentarios();
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'usuario' && isset($array_ruta[2]) && is_numeric($array_ruta[2])) {
        $c = new Controller;
        $c->muestraFichaUsuario((int)$array_ruta[2]);
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'categoria' && isset($array_ruta[2]) && is_numeric($array_ruta[2])) {
        $c = new Controller;
        $c->muestraFichaCategoria((int)$array_ruta[2]);
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'producto' && isset($array_ruta[2]) && is_numeric($array_ruta[2])) {
        $c = new Controller;
        $c->muestraFichaProducto((int)$array_ruta[2]);
    } else {
        $c = new Controller;
        $c->carga404();
    }

    // Quiere hacer consultas a la api de la aplicación
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api") {
    $ac = new ApiController;
    if (isset($array_ruta[1]) && $array_ruta[1] == 'usuarios' && isset($array_ruta[2]) && is_numeric($array_ruta[2])) {
        $ac->getUsuariosByPage((int)$array_ruta[2]);
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'productos' && isset($array_ruta[2]) && is_numeric($array_ruta[2])) {
        $ac->getProductosByPage((int)$array_ruta[2]);
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'categorias' && isset($array_ruta[2]) && is_numeric($array_ruta[2])) {
        $ac->getCategoriasByPage((int)$array_ruta[2]);
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'comentarios' && isset($array_ruta[2]) && is_numeric($array_ruta[2])) {
        $ac->getComentariosByPage((int)$array_ruta[2]);
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'usuario' && isset($array_ruta[2]) && is_numeric($array_ruta[2])) {
        $ac->getUsuarioByCod((int)$array_ruta[2]);
    } else if (
        isset($array_ruta[1]) && $array_ruta[1] == 'usuario' &&
        isset($array_ruta[2]) && $array_ruta[2] == "modificacion" &&
        isset($array_ruta[3]) && is_numeric($array_ruta[3])
    ) {
        $ac->modificaUsuario((int)$array_ruta[3]);
    } else if (
        isset($array_ruta[1]) && $array_ruta[1] == 'categoria' &&
        isset($array_ruta[2]) && $array_ruta[2] == "modificacion" &&
        isset($array_ruta[3]) && is_numeric($array_ruta[3])
    ) {
        $ac->modificaCategoria((int)$array_ruta[3]);
    } else if (
        isset($array_ruta[1]) && $array_ruta[1] == 'producto' &&
        isset($array_ruta[2]) && $array_ruta[2] == "modificacion" &&
        isset($array_ruta[3]) && is_numeric($array_ruta[3])
    ) {
        $ac->modificaProducto((int)$array_ruta[3]);
    } else if (
        isset($array_ruta[1]) && $array_ruta[1] == 'usuario' &&
        isset($array_ruta[2]) && $array_ruta[2] == "baja" &&
        isset($array_ruta[3]) && is_numeric($array_ruta[3])
    ) {
        $ac->bajaUsuario((int)$array_ruta[3]);
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'producto' && isset($array_ruta[2]) && is_numeric($array_ruta[2])) {
        $ac->getProductoByCod((int)$array_ruta[2]);
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'categoria' && isset($array_ruta[2]) && is_numeric($array_ruta[2])) {
        $ac->getCategoriaByCod((int)$array_ruta[2]);
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'comentario' && isset($array_ruta[2]) && is_numeric($array_ruta[2])) {
        $ac->getComentarioByCod((int)$array_ruta[2]);
    // Devuelve una lista de categorias segun el filtro que reciba
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'categorias' && isset($array_ruta[2]) && is_string($array_ruta[2])) {
        $ac->getCategoriasByFiltro($array_ruta[2]);
    } else if (
        isset($array_ruta[1]) && $array_ruta[1] == 'productos' && 
        isset($array_ruta[2]) && is_string($array_ruta[2]) && $array_ruta[2] != 'slider'
        ) {
        $ac->getProductosByFiltro($array_ruta[2]);
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'productos' && isset($array_ruta[2]) && $array_ruta[2] == 'slider') {
        $ac->getProductosSlider();
    }
} else { // O quiere entrar al frontend de la web o no existe la ruta a la que quiere acceder
    $fc = new FrontController;
    $ac = new AuthController;
    if (isset($array_ruta[0]) && $array_ruta[0] == 'home') {
        $fc->muestraHome();
    } else if (isset($array_ruta[0]) && $array_ruta[0] == 'login' && !isset($array_ruta[1])) {
        $ac->frontendLogin();
    } else if (isset($array_ruta[0]) && $array_ruta[0] == 'logout' && !isset($array_ruta[1])) {
        $ac->frontendLogout();
    } else if (isset($array_ruta[0]) && $array_ruta[0] == 'login' && isset($array_ruta[1]) && $array_ruta[1] == 'process') {
        $ac->processFrontendLogin();
    } else if (isset($array_ruta[0]) && $array_ruta[0] == 'register') {
        $ac->frontendRegister();
    } else if (isset($array_ruta[0]) && $array_ruta[0] == 'contact' && !isset($array_ruta[1])) {
        $fc->muestraContacto();
    } else if (isset($array_ruta[0]) && $array_ruta[0] == 'categorias') {
        $fc->muestraCategorias();
    } else if (isset($array_ruta[0]) && $array_ruta[0] == 'productos') {
        $fc->muestraProductos();
    } else if (isset($array_ruta[0]) && $array_ruta[0] == 'panelusuario') {
        $fc->muestraPanelUsuario();
    } else { // No ha encontrado la ruta a la que quiere acceder el usuario
        $c = new Controller;
        $c->carga404();
    }
}
