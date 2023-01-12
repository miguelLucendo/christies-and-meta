let URL_BASE = 'http://localhost/christies-and-meta/index.php/api/';

window.onload = () => {
    // Carga dinamicamente la primera pagina
    let url = URL_BASE + 'usuarios/1';

    $.ajax({
        url: url,
        type: 'GET',
        success: (json) => {
            console.log(json);
        }
    })
}