<?php
// Include the database connection file
include '..\db_connection.php';

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

    // Hash the password
    $hashed_password = hashPassword($password);

    // Prepare and bind the SQL statement to insert user
    $stmt = $conn->prepare("INSERT INTO users (username, password, role, branch, firstname, lastname) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $username, $hashed_password, $role, $branch, $firstname, $lastname);

    // Execute the statement
    if ($stmt->execute()) {
        echo "User registered successfully.";
        // Redirect to login page or wherever you want after successful registration
        header("Location: /summit/Admin/admin_settings.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>
