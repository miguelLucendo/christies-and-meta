<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

class Correo
{
    public static function enviaContacto(string $email, $nombre, $mensaje)
    {
        $config_json = file_get_contents('config.json');
        $decoded_json = json_decode($config_json, true);
        $correo = $decoded_json['phpmailer_mail'];
        $pass = $decoded_json['phpmailer_pass'];

        $mail = new PHPMailer(true);

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $correo;                     //SMTP username
        $mail->Password   = $pass;                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable implicit TLS encryption
        $mail->Port       = 587;

        $mail->setFrom($correo, 'Contacto');
        $mail->addAddress($correo);
        $mail->Subject = "Contacto $email --> $nombre";
        $mail->Body = "Mensaje: $mensaje";

        $mail->send();
    }
}
