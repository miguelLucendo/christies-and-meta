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
    <link rel="stylesheet" href="view/front/css/categorias.css">
</head>

<body>
    <!-- navbar -->
    <?php require_once 'navbar.php' ?>
    <!-- fin navbar -->

    <div class="content">
        <div class="container py-5">
            <h2 class="text-center">Productos</h2>
            <!-- search bar -->
            <div class="row height d-flex justify-content-center align-items-center mt-5" id="search-bar">
                <div class="col-lg-2 mb-lg-0 mb-3 text-center text-lg-left">
                    <select name="filtro" id="filtro">
                        <option value="nombre">Nombre contiene </option>
                        <option value="categoria">Categoria contiene </option>
                        <option value="comentarios">Nº Comentarios >= </option>
                        <option value="compras">Nº Compras >= </option>
                    </select>
                </div>
                <div class="col-lg-10">
                    <div class="search">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control" placeholder="¿Buscas algo?" name="busqueda" onkeyup="buscaProductos()">
                        <button class="btn btn-primary" onclick="buscaProductos()">Buscar</button>
                    </div>
                </div>
            </div>
            <!-- listado resultados -->
            <div class="row resultado-busqueda mt-5">
            </div>
        </div>
        <!-- footer -->
        <?php require_once 'footer.php' ?>

        <!-- js -->
        <script src="view/front/js/navbar.js"></script>
        <script src="view/front/js/productos.js"></script>
</body>

</html>