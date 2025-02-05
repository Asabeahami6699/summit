<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


$pageTitle = isset($pageTitle) ? $pageTitle : 'Awaiting approvals';

// Check if user is authenticated and get their role
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    // If user is not authenticated, redirect to login page
    header("Location: /SUMMIT/templates/frontend/index.php");
    exit;
}

// Include the database connection file
include '../../../../db_connection.php';
// Get the user's first name from the session
$username = $_SESSION['username'];
$branch = $_SESSION['branch'];
$firstname = $_SESSION['firstname'];
$homeUrl = isset($_SESSION['home_url']) ? $_SESSION['home_url'] : '/SUMMIT/templates/frontend/index.php';

 
$pageTitle = isset($pageTitle) ? $pageTitle : 'Active Loans';
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
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="\summit\stylesheet\loans\loan_status.css">

</head>
<body>
<div class="container-fluid mt-5">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col"></div>
            <div class="col text-right">
              
              <div class="col-md-3 downloadRight" style="float: right;">
                <div class="form-group">
                  <select id="downloadFormat" class="form-control border-box">
                    <option value="" disabled selected>
                      <i class="fas fa-download"></i> Download
                    </option>
                    <option value="csv">CSV</option>
                    <option value="pdf">PDF</option>
                    <option value="excel">Excel</option>
                    <option value="doc">Doc</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-2">
            <input type="text" id="filterInput" class="form-control" placeholder="Filter by client name...">

            </div>
            <div class="col-md-2">
              <select id="loanOfficer" class="form-control" name="loanOfficer">
                <option value="" disabled selected>Select a Loan Officer</option>
                <?php
                    // Fetch all unique loan officers who have loans in the loan_application table
                    $query = "SELECT DISTINCT loan_officer FROM loan_application";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $loanOfficerName = $row['loan_officer'];
                            echo "<option value='" . htmlspecialchars($loanOfficerName) . "'>" . htmlspecialchars($loanOfficerName) . "</option>";
                        }
                    } else {
                        echo "<option value='' disabled>No loan officers available</option>";
                    }
                ?>

              </select>
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

            <nav>
            <ul class="pagination justify-content-center">
              <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<script src=" \summit\javascript\fetchAndDisplayLoan.js"></script>
  <!-- Bootstrap JS and dependencies (jQuery) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

  
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/docxtemplater/3.22.1/docxtemplater.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/docx/7.4.0/docx.min.js"></script>


  <script src="\SUMMIT\javascript\newdownload.js" defer></script>

 

  
</body>
</html>

