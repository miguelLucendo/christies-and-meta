<?php
$config_json = file_get_contents('config.json');
$decoded_json = json_decode($config_json, true);
$project_url = $decoded_json['project_url'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $project_url ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Christie's & Meta · Login</title>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <!-- fuente -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <!-- mi css -->
    <link rel="stylesheet" href="view/front/css/login.css">
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Registro</h2>
                                <p class="text-white-50 mb-5">Por favor, introduce un correo y una contraseña </p>
                                <form action="index.php/register/process" method="POST" id="form">
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="user" name="user" class="form-control form-control-lg" />
                                        <label class="form-label" for="user">Email</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="email" id="user2" name="user2" class="form-control form-control-lg" />
                                        <label class="form-label" for="user2">Repite el email</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="pass" name="pass" class="form-control form-control-lg" />
                                        <label class="form-label" for="pass">Contraseña</label>
                                    </div>
                                    <div class="form-outline form-white mb-4">
                                        <input type="password" id="pass2" name="pass2" class="form-control form-control-lg" />
                                        <label class="form-label" for="pass2">Repite contraseña</label>
                                    </div>


                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Registrarse</button>
                                </form>

                            </div>

                            <div>
                                <p class="mb-0">¿Ya tienes cuenta? <a href="index.php/login" class="text-white-50 fw-bold">Inicia sesión</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- mi js -->
    <script src="view/front/js/validaRegistro.js"></script>
</body>

</html>