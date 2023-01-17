<?php
$config_json = file_get_contents('config.json');
$decoded_json = json_decode($config_json, true);
$project_url = $decoded_json['project_url'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?php echo $project_url ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Christie's & Meta</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="view/template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="view/template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="view/template/assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="view/template/assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End Plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="view/template/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="view/template/assets/images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <!-- partial:view/template/partials/_sidebar.html -->
        <?php require_once 'sidebar.php' ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:view/template/partials/_navbar.html -->
            <?php require_once 'navbar.php' ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- CABECERA PAGINA -->
                    <div class="page-header">
                        <h3 class="page-title"> Ficha de producto </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" aria-current="page"><a href="index.php/admin/productos">Productos</a></li>
                                <li class="breadcrumb-item active" aria-current="page"><?php echo $producto->nombre ?></li>
                            </ol>
                        </nav>
                    </div>
                    <!-- FIN CABECERA PAGINA -->
                    <!-- CONTENIDO PAGINA -->
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"><?php echo $producto->nombre ?></h4>
                                    <form method="POST" enctype="multipart/form-data" action="index.php/api/producto/modificacion/<?php echo $producto->codProducto ?>">

                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" id="email" name="nombre" placeholder="nombre" value="<?php echo $producto->nombre ?>">
                                        </div>

                                        <div class="row">
                                            <div class="col-md-2">
                                                <input type="submit" class="btn btn-info btn-fw" value="Guardar">
                                            </div>
                                            <div class="col-md-10" style="display:none;">
                                                <span class="text-info">Prodcucto actualizado con éxito</span>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN CONTENIDO PAGINA -->
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:view/template/partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2021</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin template</a> from Bootstrapdash.com</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="view/template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="view/template/assets/vendors/select2/select2.min.js"></script>
    <script src="view/template/assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="view/template/assets/js/off-canvas.js"></script>
    <script src="view/template/assets/js/hoverable-collapse.js"></script>
    <script src="view/template/assets/js/misc.js"></script>
    <script src="view/template/assets/js/settings.js"></script>
    <script src="view/template/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="view/template/assets/js/file-upload.js"></script>
    <script src="view/template/assets/js/typeahead.js"></script>
    <script src="view/template/assets/js/select2.js"></script>
    <!-- End custom js for this page -->
</body>

</html>