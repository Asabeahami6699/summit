<?php
include $_SERVER['DOCUMENT_ROOT'] . '/SUMMIT/db_connection.php';

// Query to fetch distinct loan officers from the loan application table
$sql = "SELECT DISTINCT loan_officer FROM loan_application";
$result = $conn->query($sql);

$loanOfficers = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $loanOfficers[] = $row['loan_officer'];
    }
}

$conn->close();
