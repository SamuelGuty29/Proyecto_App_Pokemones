function ocultarElemento(selector) {
    var elemento = document.querySelector(selector);
    if (elemento) {
        elemento.style.display = "none";
    }
}

window.onload = function () {
    setTimeout(function () {
        ocultarElemento(".mensaje");
        ocultarElemento(".mensaje_usuario_no_logueado");
    }, 7000);
};