document.addEventListener('DOMContentLoaded', function() {
    let userId;
    const deleteButtons = document.querySelectorAll('.delete-button');
    const confirmDeleteButton = document.getElementById('confirmDeleteButton');
    
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            userId = this.getAttribute('data-user-id');
            $('#confirmDeleteModal').modal('show');
        });
    });

    confirmDeleteButton.addEventListener('click', function() {
        const form = document.querySelector(`.delete-form[action$="/${userId}"]`);
        form.submit();
    });
});
