let URL_BASE = 'http://localhost/christies-and-meta/index.php/api/';
var paginaActual;

window.onload = () => {
    // Carga dinamicamente la primera pagina
    paginaActual = 1;
    let url = URL_BASE + 'comentarios/1';

    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            let comentarios = JSON.parse(json);
            let tbody = document.querySelector('#tbody-comentario');
            comentarios.forEach(comentario => {
                let fila = document.createElement('tr');
                fila.innerHTML = `<td>${comentario.CodComentario}</td><td>${comentario.email}</td><td>${comentario.nombre}</td>`+
                `<td>${comentario.apellidos}</td><td>${comentario.moneda}</td>`;
                tbody.appendChild(fila);
            });
        }
    })
}

function siguiente() {
    let url = URL_BASE + 'usuarios/'+ ++paginaActual;

    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            let usuarios = JSON.parse(json);
            let tbody = document.querySelector('#tbody-comentario');
            if (usuarios.length > 0) {
                tbody.innerHTML = '';
                usuarios.forEach(usuario => {
                        let fila = document.createElement('tr');
                        fila.innerHTML = `<td>${usuario.codUsuario}</td><td>${usuario.email}</td><td>${usuario.nombre}</td>`+
                        `<td>${usuario.apellidos}</td><td>${usuario.moneda}</td>`;
                        tbody.appendChild(fila);
                });
            } else {
                paginaActual--;
            }
        }
    })
}
function anterior() {
    let url = URL_BASE + 'usuarios/'+ --paginaActual;
    if (paginaActual < 1) {
        paginaActual = 1;
        return;
    }
    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            let usuarios = JSON.parse(json);
            if (usuarios.length > 0) {
                let tbody = document.querySelector('#tbody-comentario');
                tbody.innerHTML = '';
                usuarios.forEach(usuario => {
                    let fila = document.createElement('tr');
                    fila.innerHTML = `<td>${usuario.codUsuario}</td><td>${usuario.email}</td><td>${usuario.nombre}</td>`+
                    `<td>${usuario.apellidos}</td><td>${usuario.moneda}</td>`;
                    tbody.appendChild(fila);
                });
            } else {
                paginaActual++;
            }
        }
    })
}