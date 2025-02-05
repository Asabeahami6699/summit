<?php
session_start();
include('../db_connection.php');

// Function to generate company_id
function generateCompanyId($conn) {
    // Query to get the latest company_id from the companies table
    $sql = "SELECT company_id FROM companies ORDER BY company_id DESC LIMIT 1";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        // Fetch the last company_id
        $row = mysqli_fetch_assoc($result);
        $last_company_id = $row['company_id'];

        // Extract the numeric part from the company_id (removing 'LMS' and leading zeros)
        $last_number = (int)substr($last_company_id, 3);  // Get number after 'LMS'
        $new_number = $last_number + 1;
    } else {
        // If no records exist, start from LMS001
        $new_number = 1;
    }

    // Format the new company_id with leading zeros
    $new_company_id = 'LMS' . str_pad($new_number, 3, '0', STR_PAD_LEFT);
    
    return $new_company_id;
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture the form data
    $company_name = $_POST['company_name'];
    $company_address = $_POST['company_address'];
    $contact_info = $_POST['contact_info'];
    $admin_username = $_POST['admin_username'];
    $admin_password = password_hash($_POST['admin_password'], PASSWORD_DEFAULT); // Hash password for security
    $admin_role = 'admin';  // The first user is always an admin

    // Get the new company_id
    $company_id = generateCompanyId($conn);

    // Check if database connection is successful
    if ($conn) {
        // Step 1: Insert the company details into the companies table
        $sql = "INSERT INTO companies (company_id, company_name, company_address, contact_info) 
                VALUES ('$company_id', '$company_name', '$company_address', '$contact_info')";

        if (mysqli_query($conn, $sql)) {
            // Step 2: Insert the first admin into the companyadmin table with the company_id
            $sql_admin = "INSERT INTO companyadmin (company_id, username, password, role) 
                          VALUES ('$company_id', '$admin_username', '$admin_password', '$admin_role')";

            if (mysqli_query($conn, $sql_admin)) {
                // Success message
                echo "Company and first admin registered successfully! Company ID: $company_id";
            } else {
                // Error in inserting admin
                echo "Error inserting admin: " . mysqli_error($conn);
            }
        } else {
            // Error in inserting company
            echo "Error inserting company: " . mysqli_error($conn);
        }
    } else {
        echo "Database connection failed: " . mysqli_connect_error();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin - Register Company</title>
</head>
<body>
    <h1>Register a New Company</h1>
    <form method="POST" action="">
        <h3>Company Details</h3>
        <label for="company_name">Company Name:</label>
        <input type="text" name="company_name" required><br><br>

        <label for="company_address">Company Address:</label>
        <input type="text" name="company_address" required><br><br>

        <label for="contact_info">Contact Info (Phone, Email, etc.):</label>
        <input type="text" name="contact_info" required><br><br>

        <h3>First Admin Details</h3>
        <label for="admin_username">Admin Username:</label>
        <input type="text" name="admin_username" required><br><br>

        <label for="admin_password">Admin Password:</label>
        <input type="password" name="admin_password" required><br><br>

        <button type="submit">Register Company and Admin</button>
    </form>
</body>
</html>
