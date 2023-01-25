let URL_BASE = 'http://localhost/christies-and-meta/index.php/api/';
let URL_BASE_REDIRECCION = 'http://localhost/christies-and-meta/index.php/categorias/';

window.onload = () => {
    buscaCategorias();
    document.querySelector('#filtro').onchange = () => {
        buscaCategorias();
    }
}

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

            categorias.forEach(categoria => {
                let card = document.createElement('div');
                    card.classList.add('card');
                    card.classList.add('mb-3');
                    card.innerHTML = `<div class="row g-0">
                <div class="col-md-2">
                <img src="view/img/${categoria.Imagen}" class="img-fluid rounded-start card-img-top" alt="...">
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                    <h5 class="card-title">${categoria.Nombre}</h5>
                    <p class="card-text">${categoria.Descripcion}</p>
                    <p class="card-text"><b>Categoria padre: </b>${categoria.NombreCategoriaPadre || 'No tiene'}</p>
                    </div>
                </div>
                </div>`;
                resultados_busqueda.appendChild(card);
            });
        }
    );

}