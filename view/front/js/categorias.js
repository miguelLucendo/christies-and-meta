let URL_BASE = 'http://localhost/christies-and-meta/index.php/api/';
let URL_BASE_REDIRECCION = 'http://localhost/christies-and-meta/index.php/categorias/';

function buscaCategorias() {
    let filtro = document.querySelector('select[name="filtro"]');
    let busqueda = document.querySelector('input[name="busqueda"]');
    let resultados_busqueda = document.querySelector('.resultado-busqueda');
    $.post(
        URL_BASE + 'categorias/' + filtro.value,
        {
            busqueda: busqueda.value,
        },
        function (returnedData) {
            let categorias = JSON.parse(returnedData);
            let tabla = document.createElement('table');
            resultados_busqueda.innerHTML = '';

            if (categorias.length > 0) {
                tabla.className = 'table';
                tabla.innerHTML = `<thead class="thead-dark">
                <tr>
                  <th scope="col">Nombre</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Categoria Padre</th>
                </tr>
              </thead>`;
                resultados_busqueda.appendChild(tabla);
            }
            categorias.forEach(categoria => {
                let fila = document.createElement('tr');
                
                fila.innerHTML += `<td>${categoria.Nombre}</td><td>${categoria.Descripcion}</td><td>${categoria.NombreCategoriaPadre}</td>`;
                tabla.appendChild(fila);
            });
            if (categorias.length > 0) {
                resultados_busqueda.innerHTML += '</table>';
            } else { // No se ha encontrado ninguna categoria con ese filtro
                resultados_busqueda.innerHTML = '<h2 class="text-center">Ups... No se ha encontrado ninguna categoría</h2>';
                resultados_busqueda.innerHTML += '<h3 class="text-center">¿Estás seguro de que quieres buscar eso?</h3>';
            }
        }
    );

}