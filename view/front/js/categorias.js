let URL_BASE = 'http://localhost/christies-and-meta/index.php/api/';
let URL_BASE_REDIRECCION = 'http://localhost/christies-and-meta/index.php/categorias/';

function buscaCategorias() {
    let filtro = document.querySelector('select[name="filtro"]');
    let busqueda = document.querySelector('input[name="busqueda"]');
    console.log(filtro.value);
    console.log(busqueda.value);

    $.post(
        URL_BASE + 'categorias/' + filtro.value,
        {
            busqueda: busqueda.value,
        },
    );

}