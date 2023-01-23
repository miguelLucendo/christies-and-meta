let URL_BASE = 'http://localhost/christies-and-meta/index.php/api/';
let URL_BASE_REDIRECCION = 'http://localhost/christies-and-meta/index.php/admin/categoria/';

window.onload = () => {
    let slider = document.querySelector('.slider-container');
    $.ajax({
        url: URL_BASE + 'productos/slider',
        type: 'GET',
        success: (json) => {
            let productos = JSON.parse(json);

            productos.forEach(producto => {
                let li = document.createElement('li');
                li.innerHTML = `<div class="card shadow h-100">
                <div class="ratio ratio-1x1">
                    <img src="view/img/${producto.Img1}" class="card-img-top" loading="lazy" alt="...">
                </div>
                <div class="card-body d-flex flex-column flex-md-row">
                    <div class="flex-grow-1">
                        <strong>${producto.Nombre}</strong>
                        <p class="card-text">${producto.NombreCategoria}</p>
                    </div>
                    <div class="px-md-2">${producto.Precio}</div>
                </div>
            </div>`;
                slider.appendChild(li);
            });

        }
    })
}