/* validacion de ingresar solo letras, espacios y números*/ 
document.addEventListener('DOMContentLoaded', function () {
    var input = document.getElementById('buscarLibro');
    input.addEventListener('keypress', function (e) {
        var charCode = e.charCode || e.keyCode;
        var charStr = String.fromCharCode(charCode);
        // Solo permitir letras y espacios
        if (!/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s]+$/.test(charStr)) {
            e.preventDefault();
        }
    });
});