<?php
// Include necessary files and start session
include $_SERVER['DOCUMENT_ROOT'] . '/SUMMIT/db_connection.php';
// Your database connection file
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if admin is logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup update_user Form</title>
    <link rel="stylesheet" href="\SUMMIT\stylesheet\popup_form_reg.css">
</head>
<body>
    <!-- Add User button -->
    <button id="updateUserBtn">Update User</button>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Popup Form -->
    <div class="popup" id="updateUserForm">
        <span class="close" id="closeBtnup">&times;</span>
        <h2 id="formTitle">Update user</h2>
        <form id="userForm" action="\SUMMIT\backend\updateUser.php" method="post">
            <input type="hidden" name="user_id" id="user_id">
            <input type="text" name="username" id="username" placeholder="Username" class="full-width" required>
            <input type="text" name="firstname" id="firstname" placeholder="First Name" class="full-width" required>
            <input type="text" name="lastname" id="lastname" placeholder="Last Name" class="full-width" required>
            <input type="password" name="password" placeholder="Password" class="full-width" required>
            <div style="display: flex; justify-content: space-between;">
                <select name="role" id="role" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="loan_Officer">Loan Officer</option>
                    <option value="audit">Audit</option>
                </select>
                <select name="branch" id="branch" required>
                    <option value="" disabled selected>Select Branch</option>
                    <option value="Aiyinasi">Aiyinasi</option>
                    <option value="Prestea">Prestea</option>
                    <option value="Bogoso">Bogoso</option>
                    <option value="All">All Branches</option>
                </select>
            </div>
            <input type="submit" id="submitBtn" value="Update">
        </form>
    </div>



    <script src="\SUMMIT\javascript\update_user.js">

        
    </script>
</body>
</html>


