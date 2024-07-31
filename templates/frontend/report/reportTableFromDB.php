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
        <h1>Loan Report Dashboard</h1>
        
        <div class="card">
            <h2>Loan Performance</h2>
            <table>
                <thead>
                    <tr>
                        <th>Reporting</th>
                        <th>Aiyinasi</th>
                        <th>Prestea</th>
                        <th>Bogoso</th>
                        <th>Overall Performances</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Total Money Disbursed</td>
                        <td id="aiyinasiDisbursed"></td>
                        <td id="presteaDisbursed"></td>
                        <td id="bogosoDisbursed"></td>
                        <td id="overallDisbursed"></td>
                    </tr>
                    <tr>
                        <td>Total Recovery Made</td>
                        <td id="aiyinasiRecovery"></td>
                        <td id="presteaRecovery"></td>
                        <td id="bogosoRecovery"></td>
                        <td id="overallRecovery"></td>
                    </tr>
                    <tr>
                        <td>Remaining Amount to Recover</td>
                        <td id="aiyinasiRemaining"></td>
                        <td id="presteaRemaining"></td>
                        <td id="bogosoRemaining"></td>
                        <td id="overallRemaining"></td>
                    </tr>
                    <tr>
                        <td>Total Customers</td>
                        <td id="aiyinasiCustomers"></td>
                        <td id="presteaCustomers"></td>
                        <td id="bogosoCustomers"></td>
                        <td id="overallCustomers"></td>
                    </tr>
                    <tr>
                        <td>Total Groups</td>
                        <td id="aiyinasiGroups"></td>
                        <td id="presteaGroups"></td>
                        <td id="bogosoGroups"></td>
                        <td id="overallGroups"></td>
                    </tr>
                    <tr>
                        <td>Total Matured Loans</td>
                        <td id="aiyinasiMatured"></td>
                        <td id="presteaMatured"></td>
                        <td id="bogosoMatured"></td>
                        <td id="overallMatured"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    fetch('/SUMMIT/backend/reportTableFromDBbackend.php')
        .then(response => response.json())
        .then(data => {
            // Branch Data
            const aiyinasi = data.loanPerformance.aiyinasi;
            const prestea = data.loanPerformance.prestea;
            const bogoso = data.loanPerformance.bogoso;

            document.getElementById('aiyinasiDisbursed').textContent = aiyinasi.totalDisbursed;
            document.getElementById('presteaDisbursed').textContent = prestea.totalDisbursed;
            document.getElementById('bogosoDisbursed').textContent = bogoso.totalDisbursed;

            document.getElementById('aiyinasiRecovery').textContent = aiyinasi.totalRecovery;
            document.getElementById('presteaRecovery').textContent = prestea.totalRecovery;
            document.getElementById('bogosoRecovery').textContent = bogoso.totalRecovery;

            document.getElementById('aiyinasiRemaining').textContent = aiyinasi.remainingRecovery;
            document.getElementById('presteaRemaining').textContent = prestea.remainingRecovery;
            document.getElementById('bogosoRemaining').textContent = bogoso.remainingRecovery;

            document.getElementById('aiyinasiCustomers').textContent = aiyinasi.totalCustomers;
            document.getElementById('presteaCustomers').textContent = prestea.totalCustomers;
            document.getElementById('bogosoCustomers').textContent = bogoso.totalCustomers;

            document.getElementById('aiyinasiGroups').textContent = aiyinasi.totalGroups;
            document.getElementById('presteaGroups').textContent = prestea.totalGroups;
            document.getElementById('bogosoGroups').textContent = bogoso.totalGroups;

            document.getElementById('aiyinasiMatured').textContent = aiyinasi.totalMaturedLoans;
            document.getElementById('presteaMatured').textContent = prestea.totalMaturedLoans;
            document.getElementById('bogosoMatured').textContent = bogoso.totalMaturedLoans;

            // Parse values as numbers and sum them up for overall performance
            const overallDisbursed = parseFloat(aiyinasi.totalDisbursed) + parseFloat(prestea.totalDisbursed) + parseFloat(bogoso.totalDisbursed);
            const overallRecovery = parseFloat(aiyinasi.totalRecovery) + parseFloat(prestea.totalRecovery) + parseFloat(bogoso.totalRecovery);
            const overallRemaining = parseFloat(aiyinasi.remainingRecovery) + parseFloat(prestea.remainingRecovery) + parseFloat(bogoso.remainingRecovery);
            const overallCustomers = parseInt(aiyinasi.totalCustomers) + parseInt(prestea.totalCustomers) + parseInt(bogoso.totalCustomers);
            const overallGroups = parseInt(aiyinasi.totalGroups) + parseInt(prestea.totalGroups) + parseInt(bogoso.totalGroups);
            const overallMaturedLoans = parseInt(aiyinasi.totalMaturedLoans) + parseInt(prestea.totalMaturedLoans) + parseInt(bogoso.totalMaturedLoans);

            document.getElementById('overallDisbursed').textContent = overallDisbursed.toFixed(2);
            document.getElementById('overallRecovery').textContent = overallRecovery.toFixed(2);
            document.getElementById('overallRemaining').textContent = overallRemaining.toFixed(2);
            document.getElementById('overallCustomers').textContent = overallCustomers;
            document.getElementById('overallGroups').textContent = overallGroups;
            document.getElementById('overallMatured').textContent = overallMaturedLoans;
        })
        .catch(error => console.error('Error fetching data:', error));
});
</script>
</body>
</html>
