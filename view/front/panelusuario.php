<?php
$config_json = file_get_contents('config.json');
$decoded_json = json_decode($config_json, true);
$project_url = $decoded_json['project_url'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <base href="<?php echo $project_url ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christie's & Meta</title>
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- slider -->
    <script src="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/js/swiffy-slider.min.js" crossorigin="anonymous" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/swiffy-slider@1.6.0/dist/css/swiffy-slider.min.css" rel="stylesheet" crossorigin="anonymous">
    <!-- mi css -->
    <link rel="stylesheet" href="view/front/css/style.css">
</head>

<body>
    <!-- navbar -->
    <?php require_once 'navbar.php' ?>
    <!-- fin navbar -->

    <div class="content">
        <div class="container py-5">
            <!-- <h2 class="text-center">Panel usuario</h2> -->
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5" width="150px" src="view/img/default-placeholder-gris.png">
                            <span class="font-weight-bold"><?php echo $usuario->nombre ?></span>
                            <span class="text-black-50"><?php echo $usuario->email ?></span>
                        </div>
                    </div>
                    <div class="col-md-9 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Panel de usuario</h4>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Nombre</label>
                                    <input type="text" class="form-control" placeholder="Nombre" value="<?php echo $usuario->nombre ?>" name="nombre" id="nombre">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Apellidos</label>
                                    <input type="text" class="form-control" value="<?php echo $usuario->apellidos ?>" placeholder="Apellidos" name="apellidos" id="apellidos">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Email</label>
                                    <input type="email" class="form-control" placeholder="Email" value="<?php echo $usuario->email ?>" name="email1" id="email1">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Nuevo email</label>
                                    <input type="email" class="form-control" placeholder="Email" value="<?php echo $usuario->email ?>" name="email2" id="email2">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label class="labels">Monedero</label>
                                    <input type="text" class="form-control" disabled value="<?php echo $usuario->moneda ?>">
                                </div>
                                
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button" id="guardar" onclick="guardar(event, <?php echo $usuario->codUsuario ?>)">Guardar perfil</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer>

    </footer>

    <!-- js -->
    <script src="view/front/js/navbar.js"></script>
    <script src="view/front/js/validaPanelUsuario.js"></script>
</body>

</html>