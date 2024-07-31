<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// Check if user is authenticated and get their role
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    // If user is not authenticated, redirect to login page
    header("Location: index.php");
    exit;
}

// Function to check if user is admin
function is_admin() {
    return isset($_SESSION['role']) && $_SESSION['role'] == 'admin';
}


// Get the user's first name from the session

$username = $_SESSION['username'];
$branch = $_SESSION['branch'];
$firstname = $_SESSION['firstname'];
$homeUrl = isset($_SESSION['home_url']) ? $_SESSION['home_url'] : '/SUMMIT/templates/frontend/index.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Navbar</title>
    <link rel="stylesheet" type="text/css" href="\SUMMIT\stylesheet\navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CDN -->
</head>
<body>

<div class="nbf_navbar-container">
    <div class="nbf_navbar-left">
    <a href="<?php echo $homeUrl; ?>"><i class="fas fa-home" style="font-size:30px"></i> SUMMIT</a>
    </div>
    <div class="nbf_navbar-middle">
        <div class="nbf_dropdown">
            <button class="nbf_dropbtn"><i class="fas fa-user"></i> Client</button>
            <div class="nbf_dropdown-content">
                <a href="\SUMMIT\templates\frontend\clients\client_management.php">Client Management</a>
                <!--submenu bar when hover-->
                <div class="nbf_submenu-container">
                    <a href="#" class="nbf_submenu-toggle">Add New Client</a>
                    <div class="nbf_submenu">
                        <a href="\SUMMIT\templates\frontend\clients\registrationform.php">Individuals</a>
                        <a href="#">Organizations</a>
                    </div>
                </div>

                <div class="nbf_submenu-container">
                    <a href="#" class="nbf_submenu-toggle">List Client</a>
                        <div class="nbf_submenu">
                            <a href="#">Active Clients</a>
                            <a href="#">Pending Clients</a>
                            <a href="#">Rejected Clients</a>
                            <a href="#">Withdrawn Clients</a>
                            <a href="#">Close Clients Account</a>
                           

                    </div>
                </div>
            </div>
        </div>
        <div class="nbf_dropdown">
            <button class="nbf_dropbtn"> <i class="fa fa-users"></i> Group</button>
            <div class="nbf_dropdown-content">
                <a href="\SUMMIT\templates\frontend\groups\group_management.php">Group Management</a>
                <a href="#">Create New Group</a>
                

            <div class="nbf_submenu-container">
                <a href="#" class="nbf_submenu-toggle">List Group</a>
                <div class="nbf_submenu">
                        <a href="#">Active Group</a>
                        <a href="#">Pending Group</a>
                        <a href="#">Close Group Account</a>
                        <a href="#">Fully paid Groups</a>   
                    </div>
                </div>
            </div>
        </div>
        <div class="nbf_dropdown">
            <button class="nbf_dropbtn"><i class="fas fa-money-check-alt"></i> Loans</button>
            <div class="nbf_dropdown-content">
                <a href="\SUMMIT\templates\frontend\Loans\Loan_management.php">Loan Management</a>
                <a href="#" id="openLoanPopupNav">New Loan Application</a>

                <div class="nbf_submenu-container">
                    <a href="#" class="nbf_submenu-toggle">List Loans</a>
                        <div class="nbf_submenu">
                            <a href="\SUMMIT\templates\frontend\Loans\Loan_status\active_Loans.php">Active Loans</a>
                            <a href="\SUMMIT\templates\frontend\Loans\Loan_status\awaiting_approvals.php">Awaiting Approvals</a>
                            <a href="\SUMMIT\templates\frontend\Loans\Loan_status\awaiting_disbursal.php">Awaiting Disbursal</a>
                            <a href="\SUMMIT\templates\frontend\Loans\Loan_status\rejected_loans.php">Rejected Loans</a>
                            <a href="\SUMMIT\templates\frontend\Loans\Loan_status\overPaid_loans.php">Overpaid Loans</a>
                            <a href="\SUMMIT\templates\frontend\Loans\Loan_status\fullyPaid_loans.php">Fully Paid Loans</a>
                            
                        
                        </div>
                </div>
               
                <div class="nbf_submenu-container">
                    <a href="#" class="nbf_submenu-toggle">Loans Overdue</a>
                        <div class="nbf_submenu">
                            <a href="#">Matured Loan</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="nbf_dropdown">
            <button class="nbf_dropbtn"><i class="fas fa-dollar-sign"></i> Repayment</button>
            <div class="nbf_dropdown-content">
                <a href="\SUMMIT\templates\frontend\repayment1.php">Individual Repayment</a>
                <a href="#">Group Repayment</a>
                
                <div class="nbf_submenu-container">
                    <a href="#" class="nbf_submenu-toggle">Collection Due</a>
                        <div class="nbf_submenu">
                            <a href="#">This Week</a>
                            <a href="#">This Month</a>
                    </div>
                </div>
                
                <div class="nbf_submenu-container">
                    <a href="#" class="nbf_submenu-toggle">Expected Repayment</a>
                        <div class="nbf_submenu">
                            <a href="#">This Week</a>
                            <a href="#">This Month</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="nbf_dropdown">
            <button class="nbf_dropbtn"><i class="fas fa-chart-line"></i> Report</button>
            <div class="nbf_dropdown-content">
                <a href="\SUMMIT\templates\frontend\report\reportTable.php">Loan Performance</a>
            </div>
        </div>
</div>
    <div class="nbf_navbar-right">
        <div class="nbf_search-container">
            <input type="text" placeholder="Search...">
            <button type="submit"><i class="fas fa-search" style="color: blue;"></i></button>
        </div>
        <div class="nbf_profile-dropdown">
            <button class="nbf_dropbtn"><i class="fas fa-user" style="font-size:13px"></i> <?php echo htmlspecialchars($firstname); ?></button>
            <div class="nbf_dropdown-content">
                <a href="#">Profile</a>
                    <?php if (is_admin()): ?>
                    <a href="\summit\Admin\admin_settings.php">Settings</a>
                    <?php endif; ?>
                
                <a href="#" id="logoutBtn">Logout</a>
            </div>
        </div>
    </div>
</div>
<?php
// Include the new loan popup file using relative or absolute path
include $_SERVER['DOCUMENT_ROOT'] . '/SUMMIT/templates/frontend/Loans/new_loan_popup.php';
?>
<script src="/summit/javascript/submenu_nav.js"></script>
<script src="/summit/javascript/logout.js"></script>
<script src="\SUMMIT\javascript\new_loan_popup.js"></script>
</body>
</html>
