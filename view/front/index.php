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
    <link rel="icon" href="christies-meta-logo-mini.png" type="image/png">
    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
            <div id="msg-bienvenida" class="text-center my-4">Bienvenido a Christie's & Meta, una tienda relacionada con el metaverso y todas sus posibilidades.</div>
            <!-- slider -->
            <div class="swiffy-slider slider-item-show3 slider-item-reveal slider-nav-dark slider-nav-outside-expand">
                <ul class="slider-container py-4" id="slider2">
                </ul>

                <button type="button" class="slider-nav" aria-label="Go to previous"></button>
                <button type="button" class="slider-nav slider-nav-next" aria-label="Go to next"></button>
            </div>
            <!-- fin slider -->

            <!-- searchbar -->
            <div class="row height d-flex justify-content-center align-items-center mt-5" id="search-bar">
                <div class="col-md-8">
                    <div class="search">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control" placeholder="¿Buscas algo?">
                        <button class="btn btn-primary">Buscar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>

    </footer>

    <!-- js -->
    <script src="view/front/js/navbar.js"></script>
    <script src="view/front/js/rellenaSlider.js"></script>
</body>

</html>