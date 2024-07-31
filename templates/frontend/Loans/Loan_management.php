<?php 
session_start();

// Check if user is authenticated and get their role
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    // If user is not authenticated, redirect to login page
    header("Location: ../../../templates/frontend/index.php");
    exit;
}
$pageTitle = 'Loan management';
include '../navbar.php';
include '../header_bar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" href="/SUMMIT/stylesheet/clients/client_management.css">
    <link rel="stylesheet" href="/SUMMIT/stylesheet/new_loan_popup.css">
</head>

<body>
    <div class="cm_container">
        <div class="cm_main">
            <aside class="cm_sidebar">      
                <div class="search-container">
                    <input type="text" id="cm_search" placeholder="Search...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
                <h2>Loans</h2>
                <div class="cm_client-type">
                    <a href="#" id="openLoanPopupLm"><i class="fas fa-file-alt"></i> New Loan Application</a>
                </div>
                <div class="cm_client-type">
                    <a href="#"><h4>Loan Repayment</h4></a>
                </div>
                <div class="cm_client-type">
                    <a href="#"><h4>Collection Due</h4></a>
                </div>
            </aside>
            <section class="cm_client-list">
                <h2>Loan List</h2>
                <div class="cm_client-status">
                    <a href="#">Active Loans</a>
                    <span class="cm_count">(25)</span>
                </div>
                <div class="cm_client-status">
                    <a href="#">Pending Loans</a>
                    <span class="cm_count">(5)</span>
                </div>
                <div class="cm_client-status">
                    <a href="#">Rejected Loans</a>
                    <span class="cm_count">(2)</span>
                </div>
                <div class="cm_client-status">
                    <a href="#">Withdrawn Loans</a>
                    <span class="cm_count">(3)</span>
                </div>
                <div class="cm_client-status">
                    <a href="#">Overdue Loans</a>
                    <span class="cm_count">(4 from database)</span>
                </div>
                <div class="cm_client-status">
                    <a href="#">Closed Loans Accounts</a>
                    <span class="cm_count">(4 from database)</span>
                </div>
            </section>
        </div>
    </div>

    <!-- Popup for New Loan Application -->
    <div id="loanPopup" class="popup">
        <div class="popup-content">
            <h2>Choose Loan Type</h2>
            <button class="popup-button" onclick="window.location.href='/SUMMIT/templates/frontend/Loans/individual_Loan_Application.php'">Individual Loan</button>
            <button class="popup-button" onclick="window.location.href='/SUMMIT/templates/frontend/Loans/Group_Loan_Application.php'">Group Loan</button>
            <!-- Close button -->
            <span class="close" onclick="closePopup('loanPopup')">&times;</span>
        </div>
    </div>
    <div id="overlay" class="overlay"></div>

    <script src="/SUMMIT/javascript/new_loan_popup.js"></script>
</body>
</html>
