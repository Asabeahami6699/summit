<?php
$pageTitle = isset($pageTitle) ? $pageTitle : 'Default Title';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <link rel="stylesheet" type="text/css" href="\SUMMIT\stylesheet\header_bar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CDN -->

    <!-- Styles for the popup -->
    
</style>
</head>
<body>

<div class="nbf_header-bar">
    <div class="nbf_page-title">
        <?php echo $pageTitle; ?>
    </div>
    <div class="nbf_actions">
        <a href="#" id="openClientPopupHeaderBar"><i class="fas fa-user"></i> New Client</a>
        <span class="nbf_separator">|</span>
        <a href="#" id="openLoanPopupHeaderBar"><i class="fas fa-file-alt"></i> New Loan Application</a>
    </div>
</div>

<!--Include the new loan popup file using relative or absolute path-->
<?php include $_SERVER['DOCUMENT_ROOT'] . '/SUMMIT/templates/frontend/Loans/new_loan_popup.php';
?>
<script src="\SUMMIT\javascript\new_loan_popup.js"></script>



</body>
</html>
