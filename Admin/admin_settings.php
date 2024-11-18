<?php include  '..\templates\frontend\navbar.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Loan Officer Settings</title>
<link rel="stylesheet" href="../stylesheet/settings.css">
</head>
<body>



<main class="container_settings">


    <section class="profile-info">
        <h2>Authorization And Authenticated</h2>
       
        <div>
            <label for="profile-picture">Profile Picture:</label>
            <input type="file" id="profile-picture">
        </div>
    </section>

    <section class="account-actions">
        <h2>Account Actions</h2>
        <button id="delete-account">Delete Account</button>
        <button id="deactivate-account">Deactivate Account</button>
    </section>

    <section class="Add_user-actions">
    <h2>Add User</h2>
    <?php include '..\templates\frontend\add_user.php'?>
    <?php include '..\templates\frontend\delete_user.php'?>
    <?php include '..\templates\frontend\update_user.php'?>
    <?php include 'create_new_branch.php'?>
    
    <button id="deactivate-account">Deactivate Account</button>
</section>

      

    <section class="authorization">
        <h2>Authorization</h2>
        <label for="access-sensitive">Access Sensitive Parts of the Site:</label>
        <input type="checkbox" id="access-sensitive">
    </section>

    <button id="save-changes">Save Changes</button>
</main>

<footer>
    <p>&copy; 2024 summit micro credit. All rights reserved.</p>
</footer>
</body>
</html>



