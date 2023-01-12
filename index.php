<?php
// requires
require_once 'controller/AuthController.php';
require_once 'controller/Controller.php';

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
    } else if (isset($array_ruta[1]) && $array_ruta[1] == 'listado') {
        $c = new Controller;
        $c->muestraListado();
    }

    // Quiere hacer consultas a la api de la aplicación
} else if (isset($array_ruta[0]) && $array_ruta[0] == "api") {
}
