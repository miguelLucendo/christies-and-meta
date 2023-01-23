<!-- Empieza navbar -->
<header>
    <div>
        <div class="container py-4">
            <nav class="navbar navbar-expand-lg static-top">
                <div class="container">
                    <a class="navbar-brand" href="index.php/home">
                        <img src="christies-meta-logo-transparente.png" alt="..." height="36">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link enlace-navbar" aria-current="page" href="index.php/home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link enlace-navbar" href="index.php/categorias">Categorias</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Dropdown
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                            <?php if (!isset($_SESSION['autenticado_front'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link enlace-navbar" href="index.php/login">Login</a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item">
                                    <a class="nav-link enlace-navbar" href="index.php/panelusuario">Panel usuario</a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</header>