<?php
// Include the database connection file
include '..\db_connection.php';
session_start(); // Start the session to access session variables

// Function to hash passwords using password_hash()
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $branch = $_POST['branch'];

    // Get the company_id from the session
    if (isset($_SESSION['company_id'])) {
        $company_id = ($_SESSION['company_id']); 
    } else {
        echo "Error: Admin is not logged in or company ID is missing.";
        exit();
    }

    // Hash the password
    $hashed_password = hashPassword($password);

    // Prepare and bind the SQL statement to insert user
    $stmt = $conn->prepare("INSERT INTO users (username, password, role, branch, firstname, lastname, company_id) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss", $username, $hashed_password, $role, $branch, $firstname, $lastname, $company_id);

  

    // Execute the statement
    if ($stmt->execute()) {
        echo "User registered successfully.";
        // Redirect to admin settings page or another appropriate page
        header("Location: /summit/Admin/admin_settings.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>
