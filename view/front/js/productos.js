let URL_BASE = 'http://localhost/christies-and-meta/index.php/api/';
let URL_BASE_REDIRECCION = 'http://localhost/christies-and-meta/index.php/categorias/';

// triggereo el metodo al cargar la pagina para que siempre haya productos al entrar
window.onload = () => {
    buscaProductos();
    document.querySelector('#filtro').onchange = () => {
        buscaProductos();
    }
}

function buscaProductos() {
    let filtro = document.querySelector('select[name="filtro"]');
    let busqueda = document.querySelector('input[name="busqueda"]');
    let resultados_busqueda = document.querySelector('.resultado-busqueda');
    $.post(
        URL_BASE + 'productos/' + filtro.value,
        {
            busqueda: busqueda.value,
        },
        function (returnedData) {
            try {

                let productos = JSON.parse(returnedData);

                resultados_busqueda.innerHTML = '';
                productos.forEach(producto => {
                    let card = document.createElement('div');
                    card.classList.add('card');
                    card.classList.add('mb-3');
                    card.innerHTML = `<div class="row g-0">
                <div class="col-md-2">
                <img src="view/img/${producto.Img1}" class="img-fluid rounded-start card-img-top" alt="...">
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                    <h5 class="card-title">${producto.Nombre}</h5>
                    <p class="card-text">${producto.Descripcion}</p>
                    <p class="card-text"><b>Precio: </b>${producto.Precio}</p>
                    <p class="mt-auto"><b>Popularidad: </b>${producto.PopularidadTotal}</p>
                    </div>
                </div>
                </div>`;
                    resultados_busqueda.appendChild(card);
                });
            } catch (e) {

            }

        }
    );
}