document.addEventListener('DOMContentLoaded', () => {
    const updateUserBtn = document.getElementById('updateUserBtn');
    const overlay = document.getElementById('overlay');
    const popupForm = document.getElementById('updateUserForm');
    const closeBtn = document.getElementById('closeBtnup');

    // Show popup form and overlay when Update User button is clicked
    updateUserBtn.addEventListener('click', () => {
        overlay.style.display = 'block';
        popupForm.style.display = 'block';
        document.getElementById('formTitle').innerText = 'Update User';
        document.getElementById('submitBtn').value = 'Update';
    });

    // Hide popup form and overlay when close button is clicked
    closeBtn.addEventListener('click', () => {
        overlay.style.display = 'none';
        popupForm.style.display = 'none';
    });

    // Prevent closing the popup when clicking inside the popup
    popupForm.addEventListener('click', (event) => {
        event.stopPropagation();
    });

    // Prevent closing the popup when clicking inside the overlay
    overlay.addEventListener('click', () => {
        overlay.style.display = 'none';
        popupForm.style.display = 'none';
    });
});
