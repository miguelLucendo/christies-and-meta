window.onload = () => {
    let inputNombre = document.querySelector('#nombre');
    let inputDescripcion = document.querySelector('#descripcion');
    let inputLatitud = document.querySelector('#latitud');
    let inputLongitud = document.querySelector('#longitud');

    inputNombre.onkeydown = (evento) => {
        if (evento.target.value.length > 49) {
            if (evento.keyCode != 8 && evento.keyCode != 37 && evento.keyCode != 39 && evento.keyCode != 46) {
                evento.preventDefault();
                evento.stopPropagation();
            }
        }
    }
    inputDescripcion.onkeydown = (evento) => {
        if (evento.target.value.length > 99) {
            if (evento.keyCode != 8 && evento.keyCode != 37 && evento.keyCode != 39 && evento.keyCode != 46) {
                evento.preventDefault();
                evento.stopPropagation();
            }
        }
    }
    inputLatitud.onkeydown = (evento) => {
        // Flechas izquierda y derecha + borrar + suprimir
        if (evento.keyCode == 8 || evento.keyCode == 37 || evento.keyCode == 39 || evento.keyCode == 46) {
            return true;
        }
        if (/^[0-9-\\.]$/.test(evento.key)) {
            return true;
        }
        evento.preventDefault();
        evento.stopPropagation();
    }
    inputLatitud.onblur = (evento) => {
        if (/^-{0,1}(([0-8]{1}[0-9]{1}|90)|[0-9]{1})\.[0-9]+$/.evento.target) {

        }
    }
    inputLongitud.onblur = (evento) => {
        if (/^-{0,1}(([0-8]{1}[0-9]{1}|90)|[0-9]{1})\.[0-9]+$/.evento.target) {

        }
    }
    inputLongitud.onkeydown = (evento) => {
        // Flechas izquierda y derecha + borrar + suprimir
        if (evento.keyCode == 8 || evento.keyCode == 37 || evento.keyCode == 39 || evento.keyCode == 46) {
            return true;
        }
        if (/^[0-9-\\.]$/.test(evento.key)) {
            return true;
        }
        evento.preventDefault();
        evento.stopPropagation();
    }
    
}