let URL_BASE = 'http://localhost/christies-and-meta/index.php/api/';
let URL_BASE_REDIRECCION = 'http://localhost/christies-and-meta/index.php/admin/usuario/';
var paginaActual;

window.onload = () => {
    // Carga dinamicamente la primera pagina
    paginaActual = 1;
    let url = URL_BASE + 'usuarios/1';

    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            let usuarios = JSON.parse(json);
            let tbody = document.querySelector('#tbody-usuario');
            usuarios.forEach(usuario => {
                let fila = document.createElement('tr');
                fila.innerHTML = `<td>${usuario.codUsuario}</td><td>${usuario.email}</td><td>${usuario.nombre}</td>`+
                `<td>${usuario.apellidos}</td><td>${usuario.moneda}</td>`;
                tbody.appendChild(fila);
                fila.onclick = () => {
                    window.location=URL_BASE_REDIRECCION+usuario.codUsuario;   
                }
                fila.style = 'cursor: pointer;';
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
            let tbody = document.querySelector('#tbody-usuario');
            if (usuarios.length > 0) {
                tbody.innerHTML = '';
                usuarios.forEach(usuario => {
                    let fila = document.createElement('tr');
                    fila.innerHTML = `<td>${usuario.codUsuario}</td><td>${usuario.email}</td><td>${usuario.nombre}</td>`+
                    `<td>${usuario.apellidos}</td><td>${usuario.moneda}</td>`;
                    tbody.appendChild(fila);
                    fila.onclick = () => {
                        window.location=URL_BASE_REDIRECCION+usuario.codUsuario;   
                    }
                    fila.style = 'cursor: pointer;';
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
                let tbody = document.querySelector('#tbody-usuario');
                tbody.innerHTML = '';
                usuarios.forEach(usuario => {
                    let fila = document.createElement('tr');
                    fila.innerHTML = `<td>${usuario.codUsuario}</td><td>${usuario.email}</td><td>${usuario.nombre}</td>`+
                    `<td>${usuario.apellidos}</td><td>${usuario.moneda}</td>`;
                    tbody.appendChild(fila);
                    fila.onclick = () => {
                        window.location=URL_BASE_REDIRECCION+usuario.codUsuario;   
                    }
                    fila.style = 'cursor: pointer;';
                });
            } else {
                paginaActual++;
            }
        }
    })
}