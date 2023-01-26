let URL_BASE = 'http://localhost/christies-and-meta/index.php/api/';
let URL_BASE_REDIRECCION = 'http://localhost/christies-and-meta/index.php/logout/';

var inputs;
var inputNombre = document.querySelector('#nombre');
var inputApellidos = document.querySelector('#apellidos');
var inputEmail1 = document.querySelector('#email1');
var inputEmail2 = document.querySelector('#email2');
window.onload = () => {
    inputs = document.querySelectorAll('.form-control:not([disabled])');

    inputs.forEach(input => {
        input.bien = true;
    });


    inputNombre.onblur = () => {
        checkName(inputNombre);
    }
    inputApellidos.onblur = () => {
        checkApellidos(inputApellidos);
    }
    inputEmail1.onblur = () => {
        checkEmail(inputEmail1);
        if (inputEmail1.value.length > 0 && inputEmail2.value.length > 0) {
            inputCoincide(inputEmail1, inputEmail2, 'mail');
        }
    }
    inputEmail1.onblur = () => {
        checkEmail(inputEmail1);
        if (inputEmail1.value.length > 0 && inputEmail2.value.length > 0) {
            inputCoincide(inputEmail1, inputEmail2, 'mail');
        }
    }
    inputEmail2.onblur = () => {
        checkEmail(inputEmail2);
        if (inputEmail1.value.length > 0 && inputEmail2.value.length > 0) {
            inputCoincide(inputEmail2, inputEmail1, 'mail');
        }
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
function inputCoincide(input1, input2, tipo) {
    if (input1.value != input2.value) {
        // El input1 si esta mal
        if (input1.classList.contains('is-valid')) {
            input1.classList.toggle('is-valid');
        }
        if (!input1.classList.contains('is-invalid')) {
            input1.classList.toggle('is-invalid');
        }
        input1.bien = false;
        // El input2 si esta mal
        if (input2.classList.contains('is-valid')) {
            input2.classList.toggle('is-valid');
        }
        if (!input2.classList.contains('is-invalid')) {
            input2.classList.toggle('is-invalid');
        }
        input2.bien = false;
    } else {
        if (input1.bien && input2.bien) {
            if (!input1.classList.contains('is-valid')) {
                input1.classList.toggle('is-valid');
            }
            if (input1.classList.contains('is-invalid')) {
                input1.classList.toggle('is-invalid');
            }

            if (!input2.classList.contains('is-valid')) {
                input2.classList.toggle('is-valid');
            }
            if (input2.classList.contains('is-invalid')) {
                input2.classList.toggle('is-invalid');
            }
        } else {
            if (tipo == 'mail') {
                checkEmail(input2);
            } else if (tipo == 'pass') {
                passCheck(input2);
            }
        }
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
        $.post(
            'http://localhost/christies-and-meta/index.php/api/usuario/modificacion/' + codUsuario,
            {
                Email: inputEmail1.value,
                Nombre: inputNombre.value,
                Apellidos: inputApellidos.value,
            },
            function (returnedData) {
                let mensajes = document.querySelector('.mensajes');
                if (returnedData == 'true') {
                    mensajes.innerHTML = '<div class="alert alert-success" role="alert">Se ha actualizado con éxito!</div>';
                } else {
                    mensajes.innerHTML = '<div class="alert alert-danger" role="alert">No se ha podido actualizar!</div>';
                }
            }
        );
        
    }
}
function baja(codUsuario) {
    $.ajax({
        url: URL_BASE + 'usuario/baja/' + codUsuario,
        type: 'GET',
        success: (returnedData) => {
            window.location.href = URL_BASE_REDIRECCION;
        }
    })
}