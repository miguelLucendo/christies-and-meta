<?php

/**
 * @author Miguel Lucendo Esteban
 * @version 1.0.0
 * 
 * Este es el controlador que se encargará de autenticar los usuarios
 */
class AuthController {
    public function backendLogin() {
        include 'view/admin/login.php';
    }
    public function backendResetPassword() {
        include 'view/admin/recuperacion_contrasenya.php';
    }

}