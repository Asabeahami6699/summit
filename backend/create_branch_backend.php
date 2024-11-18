<?php
// Include the database connection file
include '..\db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $branch_name = $_POST['branch_name'];
    $location = $_POST['location'];

    // Prepare and bind the SQL statement to insert branch
    $stmt = $conn->prepare("INSERT INTO branch (branch_name, location) VALUES (?, ?)");
    $stmt->bind_param("ss", $branch_name, $location);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Branch created successfully.";
        // Redirect to a branch listing page or admin dashboard
        header("Location: /summit/Admin/admin_settings.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>
