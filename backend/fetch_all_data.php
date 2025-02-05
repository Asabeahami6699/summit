<?php
include '../db_connection.php';

header('Content-Type: application/json');

// Get filter from query string
$filter = isset($_GET['filter']) ? trim($_GET['filter']) : '';

// Prepare base query
$sql = "SELECT loan_id, client_name, phone, loan_amount, overdue, loan_type, branch, loan_officer FROM loan_application";

// Add filter condition if provided
if (!empty($filter)) {
    $sql .= " WHERE client_name LIKE ? OR loan_officer LIKE ?";
}

$stmt = $conn->prepare($sql);

if (!empty($filter)) {
    $likeFilter = "%$filter%";
    $stmt->bind_param('ss', $likeFilter, $likeFilter);
}

$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

$stmt->close();
$conn->close();

// Return JSON data
echo json_encode($data);
?>
