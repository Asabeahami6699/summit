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
    <button id="CreateBranchBtn">Create New Branch</button>

    <!-- Overlay -->
    <div class="overlay" id="overlay"></div>

    <!-- Popup Form -->
    <div class="popup" id="CreateBranchForm">
        <span class="close" id="closeBtn">&times;</span>
        <h2>Register</h2>
            <!-- Branch Creation Form -->
            <form action="\summit\backend\create_branch_backend.php" method="POST">
                <input type="text" name="branch_name" placeholder="Branch Name" required>
                <input type="text" name="location" placeholder="Branch Location" required>
                <button type="submit">Create Branch</button>
            </form>
        
    </div>

    <!-- Add your script -->
    <script src="\summit\javascript\createBranch.js"></script>
</body>
</html>
