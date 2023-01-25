window.onload = () => {
    let inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        input.bien = false;
    })

    let inputEmail = document.querySelector('#mail');
    let inputNombre = document.querySelector('#name');
    let inputMensaje = document.querySelector('#mensaje');
    let form = document.querySelector('#form');

    inputEmail.onblur = () => {
        checkEmail(inputEmail);
    }
    inputNombre.onblur = () => {
        checkName(inputNombre);
    }
    inputMensaje.onblur = () => {
        checkMensaje(inputMensaje);
    }
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

/**
 * 
 * @param {Element} input 
 */
function checkEmail(input) {
    let regexp = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

    if (regexp.test(input.value) && input.value.length < 320) {
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
/**
 * 
 * @param {Element} input 
 */
function checkName(input) {
    // Dejo muy abierta la expresion regular porque no es un registro que se vaya a guardar
    // en ningun lado y los nombres pueden ser muy diferentes dependiendo el país, idioma, etc.
    let regexp = /^[a-záéíóú]+$/i;

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
/**
 * 
 * @param {Element} input 
 */
function checkMensaje(input) {
    if (input.value.length > 0) {
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