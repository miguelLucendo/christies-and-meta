var inputs = document.querySelectorAll('.form-control');
window.onload = () => {
    let inputEmail = document.querySelector('#email');
    let inputNombre = document.querySelector('#nombre');
    let inputApellidos = document.querySelector('#apellidos');
    let inputMoneda = document.querySelector('#moneda');

    

    inputs.forEach(input => {
        input.bien = true;
    });

    inputEmail.onblur = () => {
        checkEmail(inputEmail);
    }
    inputNombre.onblur = () => {
        checkName(inputNombre);
    }
    inputApellidos.onblur = () => {
        checkApellidos(inputApellidos);
    }
    inputMoneda.onblur = () => {
        checkMoneda(inputMoneda);
    }
}


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
function checkApellidos(input) {
    // Dejo muy abierta la expresion regular porque no es un registro que se vaya a guardar
    // en ningun lado y los nombres pueden ser muy diferentes dependiendo el país, idioma, etc.
    let regexp = /^[a-záéíóú ]+$/i;

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
function checkMoneda(input) {
    let regexp = /^[0-9]+$/i;

    if (regexp.test(input.value) && input.value.length < 10) {
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
function guardar(evento, codUsuario) {
    let aux = false;
    inputs.forEach(input => {
        if (input.bien == false) {
            aux = true;
        }
    });
    if (aux) {
        evento.preventDefault();
        evento.stopPropagation();
    } else {
        let inputEmail = document.querySelector('#email');
        let inputNombre = document.querySelector('#nombre');
        let inputApellidos = document.querySelector('#apellidos');
        let inputMoneda = document.querySelector('#moneda');
        $.post(
            'http://localhost/christies-and-meta/index.php/api/usuario/modificacion/' + codUsuario,
            {
                Email: inputEmail.value,
                Nombre: inputNombre.value,
                Apellidos: inputApellidos.value,
                Moneda: inputMoneda.value,
            }
        );
        evento.preventDefault();
        evento.stopPropagation();
        let ruta = 'http://localhost/christies-and-meta/index.php/admin/usuario/' + codUsuario;
        location.href = ruta;
    }
}