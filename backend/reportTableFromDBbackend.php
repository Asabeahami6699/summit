<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] ."\SUMMIT\db_connectionReport.php";
// Fetch and aggregate data for each branch
$branches = ['Aiyinasi', 'Bogoso', 'Prestea'];
$data = ['loanPerformance' => [], 'maturedLoans' => [], 'overallLoanPerformance' => []];
foreach ($branches as $branch) {
    $sql = "SELECT 
                SUM(loans.amount_disbursed) AS totalDisbursed, 
                SUM(loans.amount_recovered) AS totalRecovery, 
                SUM(loans.remaining_amount) AS remainingRecovery, 
                COUNT(DISTINCT customers.customer_id) AS totalCustomers, 
                COUNT(DISTINCT groups.group_id) AS totalGroups, 
                SUM(loans.is_matured) AS totalMaturedLoans
            FROM loans 
            JOIN branches ON loans.branch_id = branches.branch_id 
            LEFT JOIN customers ON loans.loan_id = customers.loan_id
            LEFT JOIN groups ON branches.branch_id = groups.branch_id
            WHERE branches.branch_name = '$branch'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $data['loanPerformance'][strtolower($branch)] = [
        'totalDisbursed' => $row['totalDisbursed'],
        'totalRecovery' => $row['totalRecovery'],
        'remainingRecovery' => $row['remainingRecovery'],
        'totalCustomers' => $row['totalCustomers'],
        'totalGroups' => $row['totalGroups'],
        'totalMaturedLoans' => $row['totalMaturedLoans']
    ];
}

// Calculate overall loan performance
$data['overallLoanPerformance'] = [
    'totalDisbursed' => array_sum(array_column($data['loanPerformance'], 'totalDisbursed')),
    'totalRecovery' => array_sum(array_column($data['loanPerformance'], 'totalRecovery')),
    'remainingRecovery' => array_sum(array_column($data['loanPerformance'], 'remainingRecovery')),
    'totalCustomers' => array_sum(array_column($data['loanPerformance'], 'totalCustomers')),
    'totalGroups' => array_sum(array_column($data['loanPerformance'], 'totalGroups')),
    'totalMaturedLoans' => array_sum(array_column($data['loanPerformance'], 'totalMaturedLoans'))
];

echo json_encode($data);
$conn->close();
?>
