<?php
header('Content-Type: application/json');

// Sample data (replace with real data from your database)
$data = [
    'loanPerformance' => [
        'labels' => ['January', 'February', 'March', 'April', 'May', 'June'],
        'values' => [5000, 7000, 6000, 8000, 9000, 10000]
    ],
    'maturedLoans' => [
        'labels' => ['Loan 1', 'Loan 2', 'Loan 3', 'Loan 4', 'Loan 5'],
        'values' => [3000, 2000, 4000, 5000, 6000]
    ],
    'totalCustomers' => 150,
    'clientsList' => [
        'totalGroups' => 10,
        'totalClients' => 140
    ],
    'overallLoanPerformance' => [
        'labels' => ['Good', 'Average', 'Poor'],
        'values' => [70, 20, 10]
    ]
];

echo json_encode($data);
?>
