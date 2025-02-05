// Constants for pagination
let currentPage = 1;
const rowsPerPage = 25;
let loansData = []; // Store fetched loans for pagination

// Fetch and display all loans on page load
function fetchAllLoans() {
    fetch('/summit/backend/fetch_active_loans.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: ''
    })
    .then(response => response.json())
    .then(loans => {
        loansData = loans; // Store all loans for pagination
        setupPagination(loansData.length);
        displayLoans(loansData); // Display loans for the current page
    })
    .catch(error => console.error('Error fetching all loans:', error));
}

// Display loans in the table
function displayLoans(loans) {
    const tableBody = document.getElementById('loanTableBody');
    tableBody.innerHTML = ''; // Clear existing rows

    if (loans.length > 0) {
        // Calculate start and end index for pagination
        const start = (currentPage - 1) * rowsPerPage;
        const end = start + rowsPerPage;
        const loansToDisplay = loans.slice(start, end); // Slice data for the current page

        loansToDisplay.forEach(loan => {
            const row = document.createElement('tr');
            row.classList.add('clickable-row');
            row.setAttribute('data-id', loan.loan_id); // Use `loan_id` from backend
            row.innerHTML = `
                <td>${loan.loan_id}</td>
                <td>${loan.client_name}</td>
                <td>${loan.phone}</td>
                <td>${loan.loan_amount}</td>
                <td>${loan.overdue ? 'Yes' : 'No'}</td>
                <td>${loan.loan_type}</td>
                <td>${loan.branch}</td>
                <td>${loan.loan_officer}</td>
            `;
            tableBody.appendChild(row);
        });

        // Add click event listener to each row
        document.querySelectorAll('.clickable-row').forEach(row => {
            row.addEventListener('click', function () {
                const loanId = this.getAttribute('data-id');
                console.log('Clicked Loan ID:', loanId);
                // Redirect to the loan details page
                window.location.href = `/summit/templates/frontend/Loans/Loan_Details.php?id=${loanId}`;
            });
        });

    } else {
        const row = document.createElement('tr');
        row.innerHTML = `<td colspan="8">No loans available.</td>`;
        tableBody.appendChild(row);
    }
}

// Setup pagination buttons
function setupPagination(totalRows) {
    const totalPages = Math.ceil(totalRows / rowsPerPage);
    const pagination = document.querySelector('.pagination');
    pagination.innerHTML = ''; // Clear existing pagination

    const createPageItem = (page, label, isDisabled = false, isActive = false) => `
        <li class="page-item ${isDisabled ? 'disabled' : ''} ${isActive ? 'active' : ''}">
            <a class="page-link" href="#" onclick="changePage(${page})">${label}</a>
        </li>`;

    pagination.innerHTML += createPageItem(currentPage - 1, 'Previous', currentPage === 1);
    for (let i = 1; i <= totalPages; i++) {
        pagination.innerHTML += createPageItem(i, i, false, i === currentPage);
    }
    pagination.innerHTML += createPageItem(currentPage + 1, 'Next', currentPage === totalPages);
}

// Change the current page
function changePage(page) {
    const totalPages = Math.ceil(loansData.length / rowsPerPage);
    if (page < 1 || page > totalPages) return;

    currentPage = page;
    displayLoans(loansData); // Display rows for the new page
    setupPagination(loansData.length); // Refresh pagination buttons
}

// Event listener for loan officer selection
document.getElementById('loanOfficer').addEventListener('change', function () {
    const loanOfficerId = this.value;

    fetch('/summit/backend/fetch_active_loans.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `loanOfficerId=${encodeURIComponent(loanOfficerId)}`
    })
    .then(response => response.json())
    .then(loans => {
        loansData = loans; // Update data for pagination
        currentPage = 1; // Reset to first page
        setupPagination(loansData.length);
        displayLoans(loansData);
    })
    .catch(error => console.error('Error filtering loans by officer:', error));
});

// Event listener for client name filter
document.getElementById('filterInput').addEventListener('input', function () {
    const filterValue = this.value;

    fetch('/summit/backend/fetch_active_loans.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `filter=${encodeURIComponent(filterValue)}`
    })
    .then(response => response.json())
    .then(loans => {
        loansData = loans; // Update data for pagination
        currentPage = 1; // Reset to first page
        setupPagination(loansData.length);
        displayLoans(loansData);
    })
    .catch(error => console.error('Error filtering loans by name:', error));
});

// Load all loans when the page is loaded
window.addEventListener('DOMContentLoaded', fetchAllLoans);

function downloadFile(format) {
    console.log('Downloading in format:', format);
    // Example: window.location.href = `/download?format=${format}`;
}
