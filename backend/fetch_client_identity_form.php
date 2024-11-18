<?php
// fetch_group_reg.php

// Include your database connection file
include '..\db_connection.php';

// Create the query to get the data
$query = "SELECT * FROM client_identity";  // Adjust table name as needed

// Execute the query
$result = mysqli_query($conn, $query);

// Check if there are results
if (mysqli_num_rows($result) > 0) {
    // Fetch all rows as an associative array
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    // Output the data in JSON format
    echo json_encode($data);
} else {
    echo json_encode([]);  // No data found
}

mysqli_close($conn);
?>
