let URL_BASE = 'http://localhost/christies-and-meta/index.php/api/';
let URL_BASE_REDIRECCION = 'http://localhost/christies-and-meta/index.php/admin/usuarios/';

function bajaUsuario(codUsuario) {
    let url = URL_BASE + 'usuario/baja/' + codUsuario;
    $.ajax({
        url: url,
        type: 'GET',
    });
    window.location=URL_BASE_REDIRECCION;
    
}
function bajaProducto(codProducto) {

}