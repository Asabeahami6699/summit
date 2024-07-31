<?php
session_start();

// Check if user is authenticated and get their role
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    // If user is not authenticated, redirect to login page
    header("Location: /SUMMIT/templates/frontend/index.php");
    exit;
}

$username = $_SESSION['username'];
$branch = $_SESSION['branch'];

$pageTitle = 'Admin Dashboard';
include $_SERVER['DOCUMENT_ROOT'] . '/SUMMIT/templates/frontend/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CDN -->
    <link rel="stylesheet" type="text/css" href="../stylesheet/main_dashboard.css">
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/SUMMIT/templates/frontend/header_bar.php'; ?>
<h6 style="text-align:center; font-size:14px">Welcome, <?php echo htmlspecialchars($username); ?>! Branch: <?php echo htmlspecialchars($branch); ?></h6>
<div class="body_container">
    <div class="container_ofd">
        <div class="row">
            <div class="col-md-3">
                <a href="\SUMMIT\templates\frontend\clients\client_management.php" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-user" style="font-size:35px"></i>
                            <p>Clients</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="\SUMMIT\templates\frontend\groups\group_management.php" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-users" style="font-size:35px"></i>
                            <p>Groups</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="\SUMMIT\templates\frontend\Loans\Loan_management.php" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-money-check-alt" style="font-size:35px"></i>
                            <p>Loans</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="\SUMMIT\templates\frontend\repayment1.php" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-dollar-sign" style="font-size:35px"></i>
                            <p>Repayment</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="\SUMMIT\templates\frontend\report\reportTable.php" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-chart-line" style="font-size:35px"></i>
                            <p>Reports</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-search" style="font-size:35px"></i>
                            <p>Search</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="accordion-container">
        <button class="accordion">Expected payment<i class="fas fa-plus"></i></button>
        <div class="panel">
            <a href="#">Expected Repayment Today<span class="pa_count">(25)</span></a>
            <a href="#">Expected Repayment Month<span class="pa_count">(25)</span></a>
            <a href="#">Expected Repayment week<span class="pa_count">(25)</span></a>
            <a href="#">Collection Due<span class="pa_count">(25)</span></a>
        </div>
        <button class="accordion">Loans<i class="fas fa-plus"></i></button>
        <div class="panel">
            <a href="#">Loans awaiting approval <span class="pa_count">(25)</span></a>
            <a href="#">Loans awaiting disbursal<span class="pa_count">(25)</span></a>
        </div>
        <button class="accordion">Clients<i class="fas fa-plus"></i></button>
        <div class="panel">
            <a href="#">Clients awaiting approval <span class="pa_count">(25)</span></a>
        </div>
        <button class="accordion">Groups<i class="fas fa-plus"></i></button>
        <div class="panel">
            <a href="#">Groups awaiting approval<span class="pa_count">(25)</span></a>
        </div>
    </div>
</div>
<div>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/SUMMIT/templates/frontend/footer.php'; ?>
</div>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="../javascript/accordion.js"></script>
</body>
</html>
