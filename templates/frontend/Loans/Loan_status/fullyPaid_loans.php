<?php
$pageTitle = isset($pageTitle) ? $pageTitle : 'Fully paid Loans';
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
                  <th>Client Name</th>
                  <th>Phone</th>
                  <th>Loan Amount</th>
                  <th>Overdue</th>
                  <th>Loan Type</th>
                  <th>Branch</th>
                  <th>Loan Officer</th>
                </tr>
              </thead>
              <tbody id="loanTableBody">
                <!-- Table rows will be dynamically populated here -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS and dependencies (jQuery) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    // Dummy data for demonstration
    const loans = [
      { id: 1, clientName: 'John Doe', phone: '123-456-7890', loanAmount: 10000, overdue: false, loanType: 'Personal', branch: 'Main Branch', loanOfficer: 'Alice Johnson' },
      { id: 2, clientName: 'Jane Smith', phone: '987-654-3210', loanAmount: 15000, overdue: true, loanType: 'Business', branch: 'Downtown Branch', loanOfficer: 'Bob Williams' }
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
          <td>${loan.clientName}</td>
          <td>${loan.phone}</td>
          <td>${loan.loanAmount}</td>
          <td>${loan.overdue ? 'Yes' : 'No'}</td>
          <td>${loan.loanType}</td>
          <td>${loan.branch}</td>
          <td>${loan.loanOfficer}</td>
        `;
        tableBody.appendChild(row);
      });

      // Add click event listener to each row
      document.querySelectorAll('.clickable-row').forEach(row => {
        row.addEventListener('click', function() {
          const loanId = this.getAttribute('data-id');
          console.log('Clicked Loan ID:', loanId);
          // Redirect to a details page or perform other actions
          // window.location.href = `/loan-details.php?id=${loanId}`;
        });
      });
    }

    // Call populateTable function on page load
    document.addEventListener('DOMContentLoaded', () => {
      populateTable();
    });
  </script>
</body>
</html>
