window.onload = () => {
    let input_email = document.querySelector('#user');
    let input_email2 = document.querySelector('#user2');

    input_email.onblur = () => {
        checkEmail(input_email);
        if (input_email2.value.length > 0 && input_email.value.length > 0) {
            emailCoincide(input_email, input_email2);
        }
    }
    input_email2.onblur = () => {
        checkEmail(input_email2);
        if (input_email2.value.length > 0 && input_email.value.length > 0) {
            emailCoincide(input_email, input_email2);
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
function emailCoincide(input1, input2) {
    if (input1.value != input2.value) {
        // El input1 si esta mal
        if (input1.classList.contains('is-valid')) {
            input1.classList.toggle('is-valid');
        }
        if (!input1.classList.contains('is-invalid')) {
            input1.classList.toggle('is-invalid');
        }
        // El input2 si esta mal
        if (input2.classList.contains('is-valid')) {
            input2.classList.toggle('is-valid');
        }
        if (!input2.classList.contains('is-invalid')) {
            input2.classList.toggle('is-invalid');
        }
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
        }
    }
}