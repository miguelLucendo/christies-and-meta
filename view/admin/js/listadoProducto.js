let URL_BASE = 'http://localhost/christies-and-meta/index.php/api/';
let URL_BASE_REDIRECCION = 'http://localhost/christies-and-meta/index.php/admin/producto/';
var paginaActual;

window.onload = () => {
    // Carga dinamicamente la primera pagina
    paginaActual = 1;
    let url = URL_BASE + 'productos/1';

    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            let productos = JSON.parse(json);
            let tbody = document.querySelector('#tbody-producto');
            productos.forEach(producto => {
                let fila = document.createElement('tr');
                fila.innerHTML = `<td>${producto.codProducto}</td><td>${producto.nombre}</td><td>${producto.precio}</td>`+
                `<td>${producto.longitud}</td><td>${producto.latitud}</td><td>${producto.nombreCategoria}</td>`;
                tbody.appendChild(fila);
                fila.onclick = () => {
                    window.location=URL_BASE_REDIRECCION+producto.codProducto;   
                }
                fila.style = 'cursor: pointer;';
            });
        }
    })
}

function siguiente() {
    let url = URL_BASE + 'productos/'+ ++paginaActual;

    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            let productos = JSON.parse(json);
            let tbody = document.querySelector('#tbody-producto');
            if (productos.length > 0) {
                tbody.innerHTML = '';
                productos.forEach(producto => {
                    let fila = document.createElement('tr');
                    fila.innerHTML = `<td>${producto.codProducto}</td><td>${producto.nombre}</td><td>${producto.precio}</td>`+
                    `<td>${producto.longitud}</td><td>${producto.latitud}</td><td>${producto.nombreCategoria}</td>`;
                    tbody.appendChild(fila);
                    fila.onclick = () => {
                        window.location=URL_BASE_REDIRECCION+producto.codProducto;   
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
    let url = URL_BASE + 'productos/'+ --paginaActual;
    if (paginaActual < 1) {
        paginaActual = 1;
        return;
    }
    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            let productos = JSON.parse(json);
            if (productos.length > 0) {
                let tbody = document.querySelector('#tbody-producto');
                tbody.innerHTML = '';
                productos.forEach(producto => {
                    let fila = document.createElement('tr');
                    fila.innerHTML = `<td>${producto.codProducto}</td><td>${producto.nombre}</td><td>${producto.precio}</td>`+
                    `<td>${producto.longitud}</td><td>${producto.latitud}</td><td>${producto.nombreCategoria}</td>`;
                    tbody.appendChild(fila);
                    fila.onclick = () => {
                        window.location=URL_BASE_REDIRECCION+producto.codProducto;   
                    }
                    fila.style = 'cursor: pointer;';
                });
            } else {
                paginaActual++;
            }
        }
    })
}