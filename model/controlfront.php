<?php
if (!isset($_SESSION['autenticado_front'])) {

    $config_json = file_get_contents('config.json');
    $decoded_json = json_decode($config_json, true);
    $project_url = $decoded_json['project_url'];

    header("location: $project_url" . "index.php/login");
}
