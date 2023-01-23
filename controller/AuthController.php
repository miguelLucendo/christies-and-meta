<?php
require_once 'model/bd.php';

/**
 * @author Miguel Lucendo Esteban
 * @version 1.0.0
 * 
 * Este es el controlador que se encargará de autenticar los usuarios
 */
class AuthController
{
    public function backendLogin()
    {
        if (!isset($_SESSION['autenticado_back'])) {
            include 'view/admin/login.php';
        } else {
            $config_json = file_get_contents('config.json');
            $decoded_json = json_decode($config_json, true);
            $project_url = $decoded_json['project_url'];

            header("location: $project_url" . "index.php/admin/home");
        }
    }
    public function backendResetPassword()
    {
        include 'view/admin/recuperacion_contrasenya.php';
    }
    public function processBackendLogin()
    {
        $config_json = file_get_contents('config.json');
        $decoded_json = json_decode($config_json, true);
        $project_url = $decoded_json['project_url'];

        if (isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass'])) {

            if ((new BD)->login($_POST['user'], $_POST['pass'])) {
                $_SESSION['autenticado_back'] = true;



                header("location: $project_url" . "index.php/admin/home");
            } else {
                header("location: $project_url" . "index.php/admin/login");
            }
        }
    }
    public function frontendLogin()
    {
        if (!isset($_SESSION['autenticado_login'])) {
            include 'view/front/login.php';
        } else {
            $config_json = file_get_contents('config.json');
            $decoded_json = json_decode($config_json, true);
            $project_url = $decoded_json['project_url'];

            header("location: $project_url" . "index.php/home");
        }
    }
    public function processFrontendLogin()
    {
        $config_json = file_get_contents('config.json');
        $decoded_json = json_decode($config_json, true);
        $project_url = $decoded_json['project_url'];

        if (isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['pass']) && !empty($_POST['pass'])) {

            if ((new BD)->frontendLogin($_POST['user'], $_POST['pass'])) {
                $_SESSION['autenticado_back'] = true;



                header("location: $project_url" . "index.php/home");
            } else {
                header("location: $project_url" . "index.php/login");
            }
        }
    }
}
