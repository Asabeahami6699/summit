<?php
header('Content-Type: application/json');

// Sample data (replace with real data from your database)
$data = [
    'loanPerformance' => [
        'aiyinasi' => [
            'totalDisbursed' => 100000,
            'totalRecovery' => 70000,
            'remainingRecovery' => 30000,
            'totalCustomers' => 150,
            'totalGroups' => 10,
            'totalMaturedLoans' => 5
        ],
        'bogoso' => [
            'totalDisbursed' => 120000,
            'totalRecovery' => 80000,
            'remainingRecovery' => 40000,
            'totalCustomers' => 180,
            'totalGroups' => 12,
            'totalMaturedLoans' => 6
        ],
        'prestea' => [
            'totalDisbursed' => 90000,
            'totalRecovery' => 60000,
            'remainingRecovery' => 30000,
            'totalCustomers' => 130,
            'totalGroups' => 8,
            'totalMaturedLoans' => 4
        ]
    ]
];

echo json_encode($data);
?>
