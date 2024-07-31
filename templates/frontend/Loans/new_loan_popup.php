<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Some Page with Popup</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="\SUMMIT\stylesheet\new_loan_popup.css">
</head>
<body>
<div id="clientPopup" class="popup">
    <div class="popup-content">
        <h2>Choose Client Type</h2>
        <button class="popup-button" onclick="window.location.href='/SUMMIT/templates/frontend/clients/registrationform.php'">Individual Clients</button>
        <button class="popup-button" onclick="window.location.href='organization.html'">Organization Clients</button>
        <span class="close" onclick="closePopup('clientPopup')">&times;</span>
    </div>
</div>

<div id="loanPopup" class="popup">
    <div class="popup-content">
        <h2>Choose Loan Type</h2>
        <button class="popup-button" onclick="window.location.href='/SUMMIT/templates/frontend/Loans/individual_Loan_Application.php'">Individual Loan</button>
        <button class="popup-button" onclick="window.location.href='/SUMMIT/templates/frontend/Loans/Group_Loan_Application.php'">Group Loan</button>
        <span class="close" onclick="closePopup('loanPopup')">&times;</span>
    </div>
</div>

<div id="overlay" class="overlay"></div>

<script>
    // Function to close the popup
    function closePopup(popupId) {
        document.getElementById(popupId).style.display = 'none';
        document.getElementById('overlay').style.display = 'none';
    }
</script>
</body>
</html>
