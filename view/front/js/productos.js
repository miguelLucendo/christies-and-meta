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

                // resultados_busqueda.innerHTML = '';
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
                    card.onclick = () => {
                        montaFichaGrande(card, producto.CodProducto);
                    }
                    resultados_busqueda.appendChild(card);
                });
            } catch (e) {

            }

        }
    );
}
function montaFichaGrande(card, codProducto) {
    card.innerHTML = '';

    $.ajax({
        url: URL_BASE + 'producto/' + codProducto,
        type: 'GET',
        success: (json) => {
            let producto = JSON.parse(json);
            card.onclick = undefined;
            card.innerHTML = `
            <div class="card-body">
        
                <div class="swiffy-slider slider-item-ratio slider-item-ratio-16x9 slider-nav-animation slider-nav-animation-fadein" id="swiffy-animation">
    <ul class="slider-container" id="container1">
        <li id="slide1" class="slide-visible"><img src="view/img/${producto.img1}" alt="..." loading="lazy"></li>
        <li id="slide2" class=""><img src="view/img/${producto.img2}" alt="..." loading="lazy"></li>
        <li id="slide3" class=""><img src="view/img/${producto.img3}" alt="..." loading="lazy"></li>
    </ul>

    <button type="button" class="slider-nav" aria-label="Go to previous"></button>
    <button type="button" class="slider-nav slider-nav-next" aria-label="Go to next"></button>

    <div class="slider-indicators">
        <button aria-label="Go to slide" class="active"></button>
        <button aria-label="Go to slide" class=""></button>
        <button aria-label="Go to slide" class=""></button>
    </div>
</div>
                <br>
                <h5 class="card-title">${producto.nombre}</h5>
                <br>
                <p class="card-text">${producto.descripcion}</p>
                <p class="card-text"><b>Longitud: </b>${producto.longitud}</p>
                <p class="card-text"><b>Latitud: </b>${producto.latitud}</p>
                <p class="card-text"><b>Precio: </b>${producto.precio}</p>
                <p class="card-text"><b>Categoria: </b>${producto.nombreCategoria}</p>
                <div class="text-center">
                    <button type="button" class="btn btn-primary">Comprar</button>
                </div>
            </div>`;
        }
    })

}