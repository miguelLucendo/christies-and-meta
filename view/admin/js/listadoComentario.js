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
                fila.innerHTML = `<td>${comentario.codComentario}</td><td>${comentario.nombreUsuario}</td><td>${comentario.nombreProducto}</td>`;
                    
                if (comentario.texto.length > 100) {
                    fila.innerHTML += `<td>${comentario.texto.substr(0, 100) + ' [...]'}</td>`
                } else {
                    fila.innerHTML += `<td>${comentario.texto}</td>`
                }   
                fila.innerHTML += `<td>${comentario.fecha}</td>`;
                tbody.appendChild(fila);
            });
        }
    })
}

function siguiente() {
    let url = URL_BASE + 'comentarios/'+ ++paginaActual;

    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            let comentarios = JSON.parse(json);
            let tbody = document.querySelector('#tbody-comentario');
            if (comentarios.length > 0) {
                tbody.innerHTML = '';
                comentarios.forEach(comentario => {
                    let fila = document.createElement('tr');
                    fila.innerHTML = `<td>${comentario.codComentario}</td><td>${comentario.nombreUsuario}</td><td>${comentario.nombreProducto}</td>`;
                        
                    if (comentario.texto.length > 100) {
                        fila.innerHTML += `<td>${comentario.texto.substr(0, 100) + ' [...]'}</td>`
                    } else {
                        fila.innerHTML += `<td>${comentario.texto}</td>`
                    }   
                    fila.innerHTML += `<td>${comentario.fecha}</td>`;
                    tbody.appendChild(fila);
                });
            } else {
                paginaActual--;
            }
        }
    })
}
function anterior() {
    let url = URL_BASE + 'comentarios/'+ --paginaActual;
    if (paginaActual < 1) {
        paginaActual = 1;
        return;
    }
    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            let comentarios = JSON.parse(json);
            if (comentarios.length > 0) {
                let tbody = document.querySelector('#tbody-comentario');
                tbody.innerHTML = '';
                comentarios.forEach(comentario => {
                    let fila = document.createElement('tr');
                    fila.innerHTML = `<td>${comentario.codComentario}</td><td>${comentario.nombreUsuario}</td><td>${comentario.nombreProducto}</td>`;
                        
                    if (comentario.texto.length > 100) {
                        fila.innerHTML += `<td>${comentario.texto.substr(0, 100) + ' [...]'}</td>`
                    } else {
                        fila.innerHTML += `<td>${comentario.texto}</td>`
                    }   
                    fila.innerHTML += `<td>${comentario.fecha}</td>`;
                    tbody.appendChild(fila);
                });
            } else {
                paginaActual++;
            }
        }
    })
}