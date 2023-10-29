document.addEventListener('DOMContentLoaded', function() {
    eventListeners();
});

function eventListeners() {
    const mobileMenu = document.querySelector('.mobile-menu');
    const moblieIconUser = document.querySelector('.user-icon');

    mobileMenu.addEventListener('click', navegacionResponsiva);
    moblieIconUser.addEventListener('click', navegacionResponsivaUser);
}

function navegacionResponsiva () {
    const navegacion = document.querySelector('.navegacion');
    navegacion.classList.toggle('navegacion-mobile');
}
function navegacionResponsivaUser () {
    const navegacion = document.querySelector('.user-acciones');
    navegacion.classList.toggle('navegacion-mobile');
}