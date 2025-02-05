<?php
session_start();
include('../db_connection.php'); // Include your database connection

// Debugging: Check if the session is starting correctly
// var_dump($_SESSION); // Uncomment to check session values

// Check if the form is submitted
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the admin exists
    $query = "SELECT * FROM companyAdmin WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    // Debugging: Check the result of the query
    if (!$result) {
        die('Query failed: ' . mysqli_error($conn)); // Show the MySQL error if the query fails
    }

    // If admin exists, verify password
    if (mysqli_num_rows($result) > 0) {
        $admin = mysqli_fetch_assoc($result);

        // For security: Use password_verify() for password checking (assumes password is hashed in the database)
        if (password_verify($password, $admin['password'])) { 
            // Password is correct, create session
            $_SESSION['admin_id'] = $admin['admin_id'];
            $_SESSION['company_id'] = $admin['company_id'];
            $_SESSION['username'] = $admin['username'];
            $_SESSION['role'] = 'admin';  // Set the role to admin
            
            // Debugging: Check session values
            // var_dump($_SESSION); // Uncomment to check session values

            // Redirect to the admin dashboard
            header("Location: /summit/Admin/Admin_dashboard.php");  // Use absolute path for the redirect
            exit();  // Don't forget to call exit() after header to stop further script execution
        } else {
            // Invalid password
            $error = "Invalid password.";
        }
    } else {
        // Invalid username
        $error = "No admin found with that username.";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: skyblue;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    background-color: white;
    padding: 40px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    width: 100%;
    max-width: 300px;
}

h2 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.input-group {
    margin-bottom: 20px;
}

.input-group label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #555;
}

.input-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

button {
    width: 100%;
    padding: 12px;
    background-color: #007BFF;
    color: white;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

p {
    text-align: center;
    font-size: 14px;
    color: #666;
}

a {
    color: #007BFF;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>

<div class="login-container">
    <h2>Admin Login</h2>
    <form action="admin_login.php" method="POST">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>
        
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        
        <button type="submit" name="login">Login</button>
    </form>
    
    <p>Don't have an account? <a href="register_admin.php">Register</a></p>
</div>

</body>
</html>
