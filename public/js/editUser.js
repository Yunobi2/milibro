document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-button');
    const editUserForm = document.getElementById('editUserForm');
    const editUserName = document.getElementById('editUserName');
    const editUserEmail = document.getElementById('editUserEmail');
    const editUserRol = document.getElementById('editUserRol');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const userId = this.getAttribute('data-user-id');
            const userName = this.getAttribute('data-user-name');
            const userEmail = this.getAttribute('data-user-email');
            const userRol = this.getAttribute('data-user-rol');

            editUserForm.action = `/users/${userId}`;
            editUserName.value = userName;
            editUserEmail.value = userEmail;
            editUserRol.value = userRol;

            $('#editUserModal').modal('show');
        });
    });
});
