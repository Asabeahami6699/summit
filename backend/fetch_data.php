<?php
// Database connection parameters
include '..\db_connection.php';
// SQL query to fetch data
$sql = "SELECT loan_id, client_name, phone, loan_amount, overdue, loan_type, branch, loan_officer FROM loan_application"; // Replace 'loan_applications' with your actual table name
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Fetch all data into an array
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo json_encode([]);
}

$conn->close();

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
