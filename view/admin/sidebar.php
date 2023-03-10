<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.php/admin/home"><img src="christies-meta-logo-transparente.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="index.php/admin/home"><img src="christies-meta-logo-mini.png" alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        <img class="img-xs rounded-circle " src="view/template/assets/images/faces/face15.jpg" alt="">
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal"><?php echo "$admin->nombre $admin->apellidos" ?></h5>
                        <span>Miembro oro</span>
                    </div>
                </div>
                <a href="#" id="profile-dropdown" data-bs-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
                <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-settings text-primary"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Ajustes de cuenta</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-onepassword  text-info"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Cambiar contrase??a</p>
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-calendar-today text-success"></i>
                            </div>
                        </div>
                        <div class="preview-item-content">
                            <p class="preview-subject ellipsis mb-1 text-small">Cosas por hacer</p>
                        </div>
                    </a>
                </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navegacion</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="index.php/admin/home">
                <span class="menu-icon">
                    <i class="mdi mdi-home"></i>
                </span>
                <span class="menu-title">Home</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="index.php/admin/usuarios">
                <span class="menu-icon">
                    <i class="mdi mdi-account"></i>
                </span>
                <span class="menu-title">Usuarios</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="index.php/admin/productos">
                <span class="menu-icon">
                    <i class="mdi mdi-briefcase"></i>
                </span>
                <span class="menu-title">Productos</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="index.php/admin/categorias">
                <span class="menu-icon">
                    <i class="mdi mdi-view-dashboard"></i>
                </span>
                <span class="menu-title">Categorias</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="index.php/admin/comentarios">
                <span class="menu-icon">
                    <i class="mdi mdi-comment-text-outline"></i>
                </span>
                <span class="menu-title">Comentarios</span>
            </a>
        </li>
    </ul>
</nav>