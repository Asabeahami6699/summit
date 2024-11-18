<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is authenticated and get their role
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    // If user is not authenticated, redirect to login page
    header("Location: /SUMMIT/templates/frontend/index.php");
    exit;
}

// Get the user's first name from the session
$username = $_SESSION['username'];
$branch = $_SESSION['branch'];
$firstname = $_SESSION['firstname'];
$homeUrl = isset($_SESSION['home_url']) ? $_SESSION['home_url'] : '/SUMMIT/templates/frontend/index.php';

 
$pageTitle = isset($pageTitle) ? $pageTitle : 'Fully Paid Groups';
?>
<?php include '..\..\..\frontend\navbar.php'; ?>
<?php include '..\..\..\frontend\header_Bar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $pageTitle; ?></title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    /* Custom styles */
    .card-body {
      overflow-x: auto; /* Enable horizontal scrolling */
    }
    body {
      background-color: skyblue;
    }
    .clickable-row {
      cursor: pointer;
    }
    .clickable-row:hover {
      background-color: #f1f1f1; /* Light grey background on hover */
    }
  </style>
</head>
<body>
  <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <div class="row">
              <div class="col">
              </div>
              <div class="col text-right">
                <button class="btn btn-primary"><i class="fas fa-download"></i> Download</button>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-md-3">
                <input type="text" class="form-control" placeholder="Filter by...">
              </div>
              <div class="col-md-2">
                <input type="text" class="form-control" placeholder="Loan Officer...">
              </div>
            </div>
          </div>
          <div class="card-body">
          <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Account ID</th>
                <th>External ID</th>
                <th>Group Name</th>
                <th>Status</th>
                <th>Branch</th>
                <th>Loan Officer</th>
                <th>Actions</th> <!-- New column for icons -->
              </tr>
            </thead>
            <tbody id="loanTableBody">
              <!-- Table rows will be dynamically populated here -->
            </tbody>
          </table>
        </div>

        <!-- Bootstrap JS and dependencies (jQuery) -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
          // Dummy data with structure matching the updated table
          const loans = [
            { accountId: 1, externalId: 'EXT-001', groupName: 'Group Alpha', status: 'Active', branch: 'Main Branch', loanOfficer: 'Alice Johnson' },
            { accountId: 2, externalId: 'EXT-002', groupName: 'Group Beta', status: 'Overdue', branch: 'Downtown Branch', loanOfficer: 'Bob Williams' }
            // Add more data as needed
          ];

          // Function to populate the table with data
          function populateTable() {
            const tableBody = document.getElementById('loanTableBody');
            tableBody.innerHTML = ''; // Clear existing rows

            loans.forEach(loan => {
              const row = document.createElement('tr');
              row.classList.add('clickable-row');
              row.setAttribute('data-id', loan.accountId);
              row.innerHTML = `
                <td>${loan.accountId}</td>
                <td>${loan.externalId}</td>
                <td>${loan.groupName}</td>
                <td>${loan.status}</td>
                <td>${loan.branch}</td>
                <td>${loan.loanOfficer}</td>
                <td>
                  <i class="fas fa-eye" title="View" onclick="viewLoan(${loan.accountId})" style="cursor: pointer; margin-right: 10px;"></i>
                  <i class="fas fa-pen" title="Edit" onclick="editLoan(${loan.accountId})" style="cursor: pointer;"></i>
                </td>
              `;
              tableBody.appendChild(row);
            });
          }

          // Functions for view and edit actions
          function viewLoan(id) {
            console.log('Viewing Account ID:', id);
            // Implement view functionality, e.g., redirect to a details page
            // window.location.href = `/loan-details.php?id=${id}`;
          }

          function editLoan(id) {
            console.log('Editing Account ID:', id);
            // Implement edit functionality, e.g., redirect to an edit page
            // window.location.href = `/loan-edit.php?id=${id}`;
          }

          // Call populateTable function on page load
          document.addEventListener('DOMContentLoaded', () => {
            populateTable();
          });
        </script>

        <!-- Font Awesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
