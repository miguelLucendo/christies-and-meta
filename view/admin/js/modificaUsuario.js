
function guardar(evento, codUsuario) {
    let inputEmail = document.querySelector('#email');
    let inputNombre = document.querySelector('#nombre');
    let inputApellidos = document.querySelector('#apellidos');
    let inputMoneda = document.querySelector('#moneda');
    $.post(
        'http://localhost/christies-and-meta/index.php/api/usuario/modificacion/' + codUsuario,
        {
            Email: inputEmail.value,
            Nombre: inputNombre.value,
            Apellidos: inputApellidos.value,
            Moneda: inputMoneda.value,
        }
    );
    evento.preventDefault();
    evento.stopPropagation();
    let ruta = 'http://localhost/christies-and-meta/index.php/admin/usuario/' + codUsuario;
    location.href = ruta;
}
