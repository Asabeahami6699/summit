<?php
// Include the database connection file
include '..\db_connection.php';

// Start the session
session_start();

// Check if the company_id is set in the session
if (!isset($_SESSION['company_id'])) {
    die("Error: Company ID is not set in the session.");
}

// Retrieve the company_id from the session
$company_id = $_SESSION['company_id'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $branch_name = $_POST['branch_name'];
    $branch_location = $_POST['branch_location'];

    // Prepare and bind the SQL statement to insert branch
    $stmt = $conn->prepare("INSERT INTO branch (company_id, branch_name, branch_location) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $company_id, $branch_name, $branch_location);

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

