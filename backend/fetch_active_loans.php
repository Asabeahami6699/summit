<?php
include '../db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loanOfficerId = isset($_POST['loanOfficerId']) ? $_POST['loanOfficerId'] : null;
    $filter = isset($_POST['filter']) ? $_POST['filter'] : '';

    // Base query
    $query = "SELECT loan_id, client_name, phone, loan_amount, overdue, loan_type, branch, loan_officer 
              FROM loan_application 
              WHERE 1=1";

    // Add loan officer condition if set
    if (!empty($loanOfficerId)) {
        $query .= " AND loan_officer = ?";
    }

    // Add client_name filter condition if set
    if (!empty($filter)) {
        $query .= " AND client_name LIKE ?";
    }

    $stmt = $conn->prepare($query);

    // Bind parameters dynamically
    if (!empty($loanOfficerId) && !empty($filter)) {
        $filterParam = '%' . $filter . '%';
        $stmt->bind_param('ss', $loanOfficerId, $filterParam);
    } elseif (!empty($loanOfficerId)) {
        $stmt->bind_param('s', $loanOfficerId);
    } elseif (!empty($filter)) {
        $filterParam = '%' . $filter . '%';
        $stmt->bind_param('s', $filterParam);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $loans = [];
    while ($row = $result->fetch_assoc()) {
        $loans[] = $row;
    }

    // Return the results in JSON format
    echo json_encode($loans);
} else {
    // Default: Fetch all loans
    $query = "SELECT loan_id, client_name, phone, loan_amount, overdue, loan_type, branch, loan_officer FROM loan_application";
    $result = $conn->query($query);

    $loans = [];
    while ($row = $result->fetch_assoc()) {
        $loans[] = $row;
    }

    echo json_encode($loans);
}
?>
