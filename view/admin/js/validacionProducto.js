var inputs = document.querySelectorAll('.form-control');
window.onload = () => {
    let inputNombre = document.querySelector('#nombre');
    let inputDescripcion = document.querySelector('#descripcion');
    let inputLongitud = document.querySelector('#longitud');
    let inputLatitud = document.querySelector('#latitud');



    inputs.forEach(input => {
        input.bien = true;
    });

    inputNombre.onblur = () => {
        checkName(inputNombre);
    }
    inputDescripcion.onblur = () => {
        checkDescripcion(inputDescripcion);
    }
    inputLongitud.onblur = () => {
        checkLongLat(inputLongitud);
    }
    inputLatitud.onblur = () => {
        checkLongLat(inputLatitud);
    }

    let form = document.querySelector('#form');
    form.onsubmit = (evento) => {
        let aux = false;
        inputs.forEach(input => {
            if (input.bien == false) {
                aux = true;
            }
        });
        if (aux) {
            evento.preventDefault();
            evento.stopPropagation();
        }
    }
}

function checkName(input) {
    // Dejo muy abierta la expresion regular porque no es un registro que se vaya a guardar
    // en ningun lado y los nombres pueden ser muy diferentes dependiendo el país, idioma, etc.
    let regexp = /^[a-záéíóú]+$/i;

    if (regexp.test(input.value) && input.value.length < 50) {
        if (!input.classList.contains('is-valid')) {
            input.classList.toggle('is-valid');
        }
        if (input.classList.contains('is-invalid')) {
            input.classList.toggle('is-invalid');
        }
        input.bien = true;
    } else {
        if (input.classList.contains('is-valid')) {
            input.classList.toggle('is-valid');
        }
        if (!input.classList.contains('is-invalid')) {
            input.classList.toggle('is-invalid');
        }
        input.bien = false;
    }
}
function checkDescripcion(input) {
    // Dejo muy abierta la expresion regular porque no es un registro que se vaya a guardar
    // en ningun lado y los nombres pueden ser muy diferentes dependiendo el país, idioma, etc.
    let regexp = /^[a-záéíóú0-9 ]+$/i;

    if (regexp.test(input.value) && input.value.length < 100) {
        if (!input.classList.contains('is-valid')) {
            input.classList.toggle('is-valid');
        }
        if (input.classList.contains('is-invalid')) {
            input.classList.toggle('is-invalid');
        }
        input.bien = true;
    } else {
        if (input.classList.contains('is-valid')) {
            input.classList.toggle('is-valid');
        }
        if (!input.classList.contains('is-invalid')) {
            input.classList.toggle('is-invalid');
        }
        input.bien = false;
    }
}
function checkLongLat(input) {
    let regexp = /^-?([0-8]?[0-9]|90)(\.[0-9]{1,10})?$/;

    if (regexp.test(input.value) && input.value.length < 75) {
        if (!input.classList.contains('is-valid')) {
            input.classList.toggle('is-valid');
        }
        if (input.classList.contains('is-invalid')) {
            input.classList.toggle('is-invalid');
        }
        input.bien = true;
    } else {
        if (input.classList.contains('is-valid')) {
            input.classList.toggle('is-valid');
        }
        if (!input.classList.contains('is-invalid')) {
            input.classList.toggle('is-invalid');
        }
        input.bien = false;
    }
}
