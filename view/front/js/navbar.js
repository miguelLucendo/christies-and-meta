window.onload = () => {
    let enlaces = document.querySelectorAll('.enlace-navbar');
    let url = window.location.href;
    enlaces.forEach(enlace => {
        if (url == enlace.href) {
            enlace.classList.toggle('active');
        }
    });
}