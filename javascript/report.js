document.addEventListener('DOMContentLoaded', function() {
    fetch('/SUMMIT/backend/reportbackend.php')
        .then(response => response.json())
        .then(data => {
            // Loan Performance Chart
            new Chart(document.getElementById('loanPerformanceChart'), {
                type: 'line',
                data: {
                    labels: data.loanPerformance.labels,
                    datasets: [{
                        label: 'Loan Performance',
                        data: data.loanPerformance.values,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    }]
                }
            });

            // Matured Loans Chart
            new Chart(document.getElementById('maturedLoansChart'), {
                type: 'bar',
                data: {
                    labels: data.maturedLoans.labels,
                    datasets: [{
                        label: 'Matured Loans',
                        data: data.maturedLoans.values,
                        backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                    }]
                }
            });

            // Total Customers
            document.getElementById('totalCustomers').textContent = `Total Customers: ${data.totalCustomers}`;

            // Clients List
            document.getElementById('clientsList').textContent = `Total Groups: ${data.clientsList.totalGroups}, Total Clients: ${data.clientsList.totalClients}`;

            // Overall Loan Performance Chart
            new Chart(document.getElementById('overallLoanPerformanceChart'), {
                type: 'pie',
                data: {
                    labels: data.overallLoanPerformance.labels,
                    datasets: [{
                        label: 'Overall Loan Performance',
                        data: data.overallLoanPerformance.values,
                        backgroundColor: ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)'],
                        borderColor: ['rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)'],
                    }]
                }
            });
        })
        .catch(error => console.error('Error fetching data:', error));
});
