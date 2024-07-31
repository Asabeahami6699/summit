document.addEventListener('DOMContentLoaded', (event) => {
    const addUserBtn = document.getElementById('addUserBtn');
    const overlay = document.getElementById('overlay');
    const popupForm = document.getElementById('popupForm');
    const closeBtn = document.getElementById('closeBtn');

    // Show popup form and overlay when Add User button is clicked
    addUserBtn.addEventListener('click', () => {
        overlay.style.display = 'block';
        popupForm.style.display = 'block';
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
    overlay.addEventListener('click', (event) => {
        event.stopPropagation();
    });
});
