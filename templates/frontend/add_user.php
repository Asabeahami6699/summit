<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Registration Form</title>
    <link rel="stylesheet" href="/SUMMIT/stylesheet/popup_form_reg.css">
</head>
<body>
    <!-- Button to open the Add User popup -->
    <button id="addUserBtn">Add User</button>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Popup Form -->
    <div class="popup" id="addUserForm">
        <span class="close" id="closeBtn">&times;</span>
        <h2>Register</h2>
        <form action="/SUMMIT/backend/signUp.php" method="post">
            <input type="text" name="username" placeholder="Username" class="full-width" required>
            <input type="text" name="firstname" placeholder="First Name" class="full-width" required>
            <input type="text" name="lastname" placeholder="Last Name" class="full-width" required>
            <input type="password" name="password" placeholder="Password" class="full-width" required>
            <div style="display: flex; justify-content: space-between;">
                <select name="role" required>
                    <option value="" disabled selected>Select Role</option>
                    <option value="admin">Admin</option>
                    <option value="loan_Officer">Loan Officer</option>
                    <option value="audit">Audit</option>
                </select>
                <select name="branch" required>
                    <option value="" disabled selected>Select Branch</option>
                    <option value="Aiyinasi">Aiyinasi</option>
                    <option value="Prestea">Prestea</option>
                    <option value="Bogoso">Bogoso</option>
                    <option value="All">All Branches</option>
                </select>
            </div>
            <input type="submit" value="Register">
        </form>
    </div>

    <!-- Add your script -->
    <script src="/SUMMIT/javascript/add_user.js"></script>
</body>
</html>
