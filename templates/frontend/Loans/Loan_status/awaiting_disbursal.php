<?php
include $_SERVER['DOCUMENT_ROOT'] .'\SUMMIT\templates\frontend\Loans\Loan_status\loan_officer_dropdown.php'; 
$pageTitle = isset($pageTitle) ? $pageTitle : 'Awaiting Disbursal';

include '..\..\..\frontend\navbar.php'; 
include '..\..\..\frontend\header_Bar.php'; ?>
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

/* Flex properties for row alignment */
.row.mt-2.d-flex {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.downloadRight {
    margin-right: 0; /* Remove any margin */
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
            </div>
            <div class="row mt-2">
              <div class="col-md-2">
                <input type="text" class="form-control" placeholder="Filter by...">
              </div>

              <div class="col-md-2">
                <select id="loanOfficer" class="form-control">
            <!-- the foreach below search for loan officers register under loans and 
             show the in the loan office dropdown button-->
                  <option value="">Loan Officer</option>
                  <?php foreach ($loanOfficers as $officer): ?>
                    <option value="<?php echo htmlspecialchars($officer); ?>">
                      <?php echo htmlspecialchars($officer); ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
              
              <div class="col-md-2 downloadRight">
                 <div class="form-group">
                    <select id="downloadFormat" class="form-control">
                      <option value="" disabled selected>Download</option>
                      <option value="csv">CSV</option>
                      <option value="pdf">PDF</option>
                      <option value="excel">Excel</option>
                      <option value="doc">Doc</option>
                  </select>
                </div>
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.1.0/docx.min.js"></script>


  <script>

  function downloadFile(format) {
    // Implement your download logic here
    console.log('Downloading in format:', format);
    // Example: window.location.href = `/download?format=${format}`;
  }
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
  <script src="\SUMMIT\javascript\download.js" defer></script>
  <script src="\SUMMIT\javascript\pdf.js" defer></script>
</body>
</html>
