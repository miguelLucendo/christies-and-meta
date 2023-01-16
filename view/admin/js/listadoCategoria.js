let URL_BASE = 'http://localhost/christies-and-meta/index.php/api/';
let URL_BASE_REDIRECCION = 'http://localhost/christies-and-meta/index.php/admin/categoria/';
var paginaActual;

window.onload = () => {
    // Carga dinamicamente la primera pagina
    paginaActual = 1;
    let url = URL_BASE + 'categorias/1';

    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            let categorias = JSON.parse(json);
            let tbody = document.querySelector('#tbody-categoria');
            categorias.forEach(categoria => {
                let fila = document.createElement('tr');
                fila.innerHTML = `<td>${categoria.codCategoria}</td><td>${categoria.nombre}</td><td>${categoria.descripcion}</td>`+
                `<td>${categoria.codCategoriaPadre}</td>`;
                tbody.appendChild(fila);
                fila.onclick = () => {
                    window.location=URL_BASE_REDIRECCION+categoria.codCategoria;   
                }
                fila.style = 'cursor: pointer;';
            });
        }
    })
}

function siguiente() {
    let url = URL_BASE + 'categorias/'+ ++paginaActual;

    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            let categorias = JSON.parse(json);
            let tbody = document.querySelector('#tbody-categoria');
            if (categorias.length > 0) {
                tbody.innerHTML = '';
                categorias.forEach(categoria => {
                    let fila = document.createElement('tr');
                    fila.innerHTML = `<td>${categoria.codCategoria}</td><td>${categoria.nombre}</td><td>${categoria.descripcion}</td>`+
                    `<td>${categoria.codCategoriaPadre}</td>`;
                    tbody.appendChild(fila);
                    fila.onclick = () => {
                        window.location=URL_BASE_REDIRECCION+categoria.codCategoria;   
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
    let url = URL_BASE + 'categorias/'+ --paginaActual;
    if (paginaActual < 1) {
        paginaActual = 1;
        return;
    }
    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            let categorias = JSON.parse(json);
            if (categorias.length > 0) {
                let tbody = document.querySelector('#tbody-categoria');
                tbody.innerHTML = '';
                categorias.forEach(categoria => {
                    let fila = document.createElement('tr');
                    fila.innerHTML = `<td>${categoria.codCategoria}</td><td>${categoria.nombre}</td><td>${categoria.descripcion}</td>`+
                    `<td>${categoria.codCategoriaPadre}</td>`;
                    tbody.appendChild(fila);
                    fila.onclick = () => {
                        window.location=URL_BASE_REDIRECCION+categoria.codCategoria;   
                    }
                    fila.style = 'cursor: pointer;';
                });
            } else {
                paginaActual++;
            }
        }
    })
}