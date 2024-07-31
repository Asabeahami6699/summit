document.addEventListener('DOMContentLoaded', function() {
    fetch('/SUMMIT/backend/officerReportBackend.php')
        .then(response => response.json())
        .then(data => {
            // Aiyinasi Branch
            const aiyinasiBranch = document.getElementById('aiyinasiBranch');
            aiyinasiBranch.innerHTML = `
                <h3>Aiyinasi Branch</h3>
                <p>Total Money Disbursed: ${data.loanPerformance.aiyinasi.totalDisbursed}</p>
                <p>Total Recovery Made: ${data.loanPerformance.aiyinasi.totalRecovery}</p>
                <p>Remaining Amount to Recover: ${data.loanPerformance.aiyinasi.remainingRecovery}</p>
                <p>Total Customers: ${data.loanPerformance.aiyinasi.totalCustomers}</p>
                <p>Total Groups: ${data.loanPerformance.aiyinasi.totalGroups}</p>
            `;

            // Bogoso Branch
            const bogosoBranch = document.getElementById('bogosoBranch');
            bogosoBranch.innerHTML = `
                <h3>Bogoso Branch</h3>
                <p>Total Money Disbursed: ${data.loanPerformance.bogoso.totalDisbursed}</p>
                <p>Total Recovery Made: ${data.loanPerformance.bogoso.totalRecovery}</p>
                <p>Remaining Amount to Recover: ${data.loanPerformance.bogoso.remainingRecovery}</p>
                <p>Total Customers: ${data.loanPerformance.bogoso.totalCustomers}</p>
                <p>Total Groups: ${data.loanPerformance.bogoso.totalGroups}</p>
            `;

            // Prestea Branch
            const presteaBranch = document.getElementById('presteaBranch');
            presteaBranch.innerHTML = `
                <h3>Prestea Branch</h3>
                <p>Total Money Disbursed: ${data.loanPerformance.prestea.totalDisbursed}</p>
                <p>Total Recovery Made: ${data.loanPerformance.prestea.totalRecovery}</p>
                <p>Remaining Amount to Recover: ${data.loanPerformance.prestea.remainingRecovery}</p>
                <p>Total Customers: ${data.loanPerformance.prestea.totalCustomers}</p>
                <p>Total Groups: ${data.loanPerformance.prestea.totalGroups}</p>
            `;

            // Matured Loans
            const maturedLoans = document.getElementById('maturedLoans');
            maturedLoans.innerHTML = `
                <p>Total Disbursed: ${data.maturedLoans.totalDisbursed}</p>
                <p>Total Recovery: ${data.maturedLoans.totalRecovery}</p>
                <p>Remaining Amount: ${data.maturedLoans.remainingAmount}</p>
            `;

            // Overall Loan Performance
            const overallLoanPerformance = document.getElementById('overallLoanPerformance');
            overallLoanPerformance.innerHTML = `
                <p>Total Disbursed: ${data.overallLoanPerformance.totalDisbursed}</p>
                <p>Total Recovery: ${data.overallLoanPerformance.totalRecovery}</p>
                <p>Remaining Amount: ${data.overallLoanPerformance.remainingAmount}</p>
            `;
        })
        .catch(error => console.error('Error fetching data:', error));
});
