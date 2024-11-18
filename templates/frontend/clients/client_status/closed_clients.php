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

 
$pageTitle = isset($pageTitle) ? $pageTitle : 'Closed Clients Account';
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
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Loan ID</th>
        <th>External ID</th>
        <th>Client Name</th>
        <th>Phone</th>
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
  // Dummy data with structure matching the table
  const loans = [
    { id: 1, externalId: 'EXT-001', clientName: 'John Doe', phone: '123-456-7890', status: 'Active', branch: 'Main Branch', loanOfficer: 'Alice Johnson' },
    { id: 2, externalId: 'EXT-002', clientName: 'Jane Smith', phone: '987-654-3210', status: 'Overdue', branch: 'Downtown Branch', loanOfficer: 'Bob Williams' }
    // Add more data as needed
  ];

  // Function to populate the table with data
  function populateTable() {
    const tableBody = document.getElementById('loanTableBody');
    tableBody.innerHTML = ''; // Clear existing rows

    loans.forEach(loan => {
      const row = document.createElement('tr');
      row.classList.add('clickable-row');
      row.setAttribute('data-id', loan.id);
      row.innerHTML = `
        <td>${loan.id}</td>
        <td>${loan.externalId}</td>
        <td>${loan.clientName}</td>
        <td>${loan.phone}</td>
        <td>${loan.status}</td>
        <td>${loan.branch}</td>
        <td>${loan.loanOfficer}</td>
        <td>
          <i class="fas fa-eye" title="View" onclick="viewLoan(${loan.id})" style="cursor: pointer; margin-right: 10px;"></i>
          
        </td>
      `;
      tableBody.appendChild(row);
    });
  }

  // Functions for view and edit actions
  function viewLoan(id) {
    console.log('Viewing Loan ID:', id);
    // Implement view functionality, e.g., redirect to a details page
    // window.location.href = `/loan-details.php?id=${id}`;
  }

  function editLoan(id) {
    console.log('Editing Loan ID:', id);
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
