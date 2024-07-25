document.addEventListener('DOMContentLoaded', function () {
    const createUserButton = document.getElementById('createUserButton');

    if (createUserButton) { // Verifica si el botón existe
        createUserButton.addEventListener('click', function () {
            $('#createUserModal').modal('show');
        });
    } else {
        console.error('El botón createUserButton no se encontró en el DOM.');
    }
});