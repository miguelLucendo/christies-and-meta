window.onload = () => {
    let inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        input.bien = false;
    });
    
    let input_email = document.querySelector('#user');
    let input_email2 = document.querySelector('#user2');

    input_email.onblur = () => {
        checkEmail(input_email);
        if (input_email2.value.length > 0 && input_email.value.length > 0) {
            inputCoincide(input_email, input_email2, 'mail');
        }
        debug();
    }
    input_email2.onblur = () => {
        checkEmail(input_email2);
        if (input_email2.value.length > 0 && input_email.value.length > 0) {
            inputCoincide(input_email2, input_email, 'mail');
        }
        debug();
    }

    let input_pass = document.querySelector('#pass');
    let input_pass2 = document.querySelector('#pass2');

    input_pass.onblur = () => {
        passCheck(input_pass);
        if (input_pass2.value.length > 0 && input_pass.value.length > 0) {
            inputCoincide(input_pass, input_pass2, 'pass');
        }
        debug();
    }
    input_pass2.onblur = () => {
        passCheck(input_pass2);
        if (input_pass2.value.length > 0 && input_pass.value.length > 0) {
            inputCoincide(input_pass2, input_pass, 'pass');
        }
        debug();
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
/**
 * 
 * @param {Element} input 
 */
function checkEmail(input) {
    let regexp = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

    if (regexp.test(input.value)) {
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
function passCheck(input) {
    if (
        input.value.length > 7 &&
        /[a-z]+/.test(input.value) &&
        /[A-Z]+/.test(input.value) &&
        /[0-9]+/.test(input.value)
    ) {
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
function debug() {
    let inputs = document.querySelectorAll('.form-control');
    inputs.forEach(input => {
        console.log(input.name + ' => ' + input.bien);
    });
    console.log('==========');
}