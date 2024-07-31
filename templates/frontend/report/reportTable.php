<?php
    $pageTitle = 'ReportFromDb';
    include $_SERVER['DOCUMENT_ROOT'] .'\SUMMIT\templates\frontend\navbar.php';
    include $_SERVER['DOCUMENT_ROOT'] .'\SUMMIT\templates\frontend\header_Bar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Report Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: skyblue;
            margin: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            margin-top: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .card {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 20px;
        }

        .card h2 {
            margin-top: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Loan Performance</h2>
            <table id="loanPerformanceTable">
                <thead>
                    <tr>
                        <th>Branch</th>
                        <th>Total Money Disbursed</th>
                        <th>Total Recovery Made</th>
                        <th>Remaining Amount to Recover</th>
                        <th>Total Customers</th>
                        <th>Total Groups</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="aiyinasiBranch"></tr>
                    <tr id="bogosoBranch"></tr>
                    <tr id="presteaBranch"></tr>
                </tbody>
            </table>
        </div>

        <div class="card">
            <h2>Overall Loan Performance</h2>
            <table id="overallLoanPerformanceTable">
                <thead>
                    <tr>
                        <th>Total Disbursed</th>
                        <th>Total Recovery</th>
                        <th>Remaining Amount</th>
                        <th>Total Customers</th>
                        <th>Total Groups</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="overallLoanPerformance"></tr>
                </tbody>
            </table>
        </div>
        <div class="card">
            <h2>Matured Loans</h2>
            <table id="maturedLoansTable">
                <thead>
                    <tr>
                        <th>Total Disbursed</th>
                        <th>Total Recovery</th>
                        <th>Remaining Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="maturedLoans"></tr>
                </tbody>
            </table>
        </div>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/SUMMIT/backend/reportTableFromDBbackend.php')
                .then(response => response.json())
                .then(data => {
                    // Aiyinasi Branch
                    const aiyinasiBranch = document.getElementById('aiyinasiBranch');
                    aiyinasiBranch.innerHTML = `
                        <td>Aiyinasi</td>
                        <td>${data.loanPerformance.aiyinasi.totalDisbursed}</td>
                        <td>${data.loanPerformance.aiyinasi.totalRecovery}</td>
                        <td>${data.loanPerformance.aiyinasi.remainingRecovery}</td>
                        <td>${data.loanPerformance.aiyinasi.totalCustomers}</td>
                        <td>${data.loanPerformance.aiyinasi.totalGroups}</td>
                    `;

                    // Bogoso Branch
                    const bogosoBranch = document.getElementById('bogosoBranch');
                    bogosoBranch.innerHTML = `
                        <td>Bogoso</td>
                        <td>${data.loanPerformance.bogoso.totalDisbursed}</td>
                        <td>${data.loanPerformance.bogoso.totalRecovery}</td>
                        <td>${data.loanPerformance.bogoso.remainingRecovery}</td>
                        <td>${data.loanPerformance.bogoso.totalCustomers}</td>
                        <td>${data.loanPerformance.bogoso.totalGroups}</td>
                    `;

                    // Prestea Branch
                    const presteaBranch = document.getElementById('presteaBranch');
                    presteaBranch.innerHTML = `
                        <td>Prestea</td>
                        <td>${data.loanPerformance.prestea.totalDisbursed}</td>
                        <td>${data.loanPerformance.prestea.totalRecovery}</td>
                        <td>${data.loanPerformance.prestea.remainingRecovery}</td>
                        <td>${data.loanPerformance.prestea.totalCustomers}</td>
                        <td>${data.loanPerformance.prestea.totalGroups}</td>
                    `;

                    // Parse values as numbers and sum them up for overall performance
                    const overallDisbursed = parseFloat(data.loanPerformance.aiyinasi.totalDisbursed) + parseFloat(data.loanPerformance.prestea.totalDisbursed) + parseFloat(data.loanPerformance.bogoso.totalDisbursed);
                    const overallRecovery = parseFloat(data.loanPerformance.aiyinasi.totalRecovery) + parseFloat(data.loanPerformance.prestea.totalRecovery) + parseFloat(data.loanPerformance.bogoso.totalRecovery);
                    const overallRemaining = parseFloat(data.loanPerformance.aiyinasi.remainingRecovery) + parseFloat(data.loanPerformance.prestea.remainingRecovery) + parseFloat(data.loanPerformance.bogoso.remainingRecovery);
                    const overallCustomers = parseInt(data.loanPerformance.aiyinasi.totalCustomers) + parseInt(data.loanPerformance.prestea.totalCustomers) + parseInt(data.loanPerformance.bogoso.totalCustomers);
                    const overallGroups = parseInt(data.loanPerformance.aiyinasi.totalGroups) + parseInt(data.loanPerformance.prestea.totalGroups) + parseInt(data.loanPerformance.bogoso.totalGroups);

                    // Overall Loan Performance
                    const overallLoanPerformance = document.getElementById('overallLoanPerformance');
                    overallLoanPerformance.innerHTML = `
                        <td>${overallDisbursed.toFixed(2)}</td>
                        <td>${overallRecovery.toFixed(2)}</td>
                        <td>${overallRemaining.toFixed(2)}</td>
                        <td>${overallCustomers}</td>
                        <td>${overallGroups}</td>
                    `;

                    // Matured Loans
                    const maturedLoans = document.getElementById('maturedLoans');
                    maturedLoans.innerHTML = `
                        <td>${data.maturedLoans.totalDisbursed}</td>
                        <td>${data.maturedLoans.totalRecovery}</td>
                        <td>${data.maturedLoans.remainingAmount}</td>
                    `;
                })
                .catch(error => console.error('Error fetching data:', error));
        });
    </script>
</body>
</html>
