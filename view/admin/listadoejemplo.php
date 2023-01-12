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
        <!-- partial:../../partials/_sidebar.html -->
        <?php require_once 'sidebar.php' ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_navbar.html -->
            <?php require_once 'navbar.php' ?>
            <!-- partial -->

            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- CABECERA PAGINA -->
                    <div class="page-header">
                        <h3 class="page-title"> Listado de ejemplo </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Listado ejemplo</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- FIN CABECERA PAGINA -->
                    <!-- CONTENIDO PAGINA -->
                    <div class="row">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Tabla de ejemplo</h4>
                                    <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                                        <input type="text" class="form-control" placeholder="Search products">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-outline-secondary btn-icon-text dropdown-toggle" data-bs-toggle="dropdown">
                                                <i class="mdi mdi-filter-outline btn-icon-prepend"></i></button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item">Filtro1</a>
                                                <a class="dropdown-item">Filtro2</a>
                                                <a class="dropdown-item">Filtro3</a>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="table-responsive mt-5 mb-4">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>User</th>
                                                    <th>Product</th>
                                                    <th>Sale</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Jacob</td>
                                                    <td>Photoshop</td>
                                                    <td class="text-danger"> 28.76% <i class="mdi mdi-arrow-down"></i></td>
                                                    <td><label class="badge badge-danger">Pending</label></td>
                                                </tr>
                                                <tr>
                                                    <td>Messsy</td>
                                                    <td>Flash</td>
                                                    <td class="text-danger"> 21.06% <i class="mdi mdi-arrow-down"></i></td>
                                                    <td><label class="badge badge-warning">In progress</label></td>
                                                </tr>
                                                <tr>
                                                    <td>John</td>
                                                    <td>Premier</td>
                                                    <td class="text-danger"> 35.00% <i class="mdi mdi-arrow-down"></i></td>
                                                    <td><label class="badge badge-info">Fixed</label></td>
                                                </tr>
                                                <tr>
                                                    <td>Peter</td>
                                                    <td>After effects</td>
                                                    <td class="text-success"> 82.00% <i class="mdi mdi-arrow-up"></i></td>
                                                    <td><label class="badge badge-success">Completed</label></td>
                                                </tr>
                                                <tr>
                                                    <td>Dave</td>
                                                    <td>53275535</td>
                                                    <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                                                    <td><label class="badge badge-warning">In progress</label></td>
                                                </tr>
                                                <tr>
                                                    <td>Dave</td>
                                                    <td>53275535</td>
                                                    <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                                                    <td><label class="badge badge-warning">In progress</label></td>
                                                </tr>
                                                <tr>
                                                    <td>Dave</td>
                                                    <td>53275535</td>
                                                    <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                                                    <td><label class="badge badge-warning">In progress</label></td>
                                                </tr>
                                                <tr>
                                                    <td>Dave</td>
                                                    <td>53275535</td>
                                                    <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                                                    <td><label class="badge badge-warning">In progress</label></td>
                                                </tr>
                                                <tr>
                                                    <td>Dave</td>
                                                    <td>53275535</td>
                                                    <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                                                    <td><label class="badge badge-warning">In progress</label></td>
                                                </tr>
                                                <tr>
                                                    <td>Dave</td>
                                                    <td>53275535</td>
                                                    <td class="text-success"> 98.05% <i class="mdi mdi-arrow-up"></i></td>
                                                    <td><label class="badge badge-warning">In progress</label></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-outline-info">Anterior</button>
                                        <button type="button" class="btn btn-outline-info">Siguiente</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIN CONTENIDO PAGINA -->
                </div>




                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
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
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="view/template/assets/js/off-canvas.js"></script>
    <script src="view/template/assets/js/hoverable-collapse.js"></script>
    <script src="view/template/assets/js/misc.js"></script>
    <script src="view/template/assets/js/settings.js"></script>
    <script src="view/template/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
</body>

</html>