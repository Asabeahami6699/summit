<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete user</title>
    <!-- Your CSS stylesheet link here -->
</head>
<body>
    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Delete User button -->
    <button id="deleteUserBtn">Delete User</button>

    <!-- Delete User Popup -->
    <div class="popup" id="deletePopup">
        <span class="close" id="deleteCloseBtn">&times;</span>
        <h2>Delete User</h2>
        <form id="deleteForm" method="POST">
            <input type="text" name="adminUsername" placeholder="Admin Username" class="full-width" required>
            <input type="password" name="adminPassword" placeholder="Admin Password" class="full-width" required>
            <input type="hidden" id="userIdToDelete" name="userId">
            <input type="text" id="usernameToDelete" name="usernameToDelete" placeholder="Username to Delete" class="full-width" required>
            <input type="submit" value="Delete">
        </form>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const deleteUserBtn = document.getElementById('deleteUserBtn');
        const overlay = document.getElementById('overlay');
        const deletePopup = document.getElementById('deletePopup');
        const deleteCloseBtn = document.getElementById('deleteCloseBtn');

        // Show delete popup and overlay when Delete User button is clicked
        deleteUserBtn.addEventListener('click', () => {
            overlay.style.display = 'block';
            deletePopup.style.display = 'block';
        });

        // Hide delete popup and overlay when close button is clicked
        deleteCloseBtn.addEventListener('click', () => {
            overlay.style.display = 'none';
            deletePopup.style.display = 'none';
        });

        // Prevent closing the delete popup when clicking inside it
        deletePopup.addEventListener('click', (event) => {
            event.stopPropagation();
        });

        // Hide delete popup and overlay when clicking outside the popup
        overlay.addEventListener('click', () => {
            overlay.style.display = 'none';
            deletePopup.style.display = 'none';
        });

        // Submit delete form
        const deleteForm = document.getElementById('deleteForm');
        deleteForm.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent the default form submission behavior

            const formData = new FormData(deleteForm);

            fetch('/SUMMIT/backend/delete_user_handling.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Display the response message as an alert
                alert(data);

                // Close the popup and overlay
                overlay.style.display = 'none';
                deletePopup.style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
    </script>
</body>
</html>
