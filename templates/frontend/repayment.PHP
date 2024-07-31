<?php 
    include $_SERVER['DOCUMENT_ROOT'] .'\SUMMIT\templates\frontend\navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Repayment</title>
    <link rel="stylesheet" href="..\..\stylesheet\repayment.css">
    
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Loan Repayment Portal</h1>
            <p>Manage your loan repayments efficiently and securely.</p>
        </div>
        <div class="form-container">
            <form action="/submit_repayment" method="POST" id="repaymentForm">
                <label for="repaymentType">Repayment Type</label>
                <select id="repaymentType" name="repaymentType" required>
                    <option value="" disabled selected>Select repayment type</option>
                    <option value="individual">Individual Repayment</option>
                    <option value="group">Group Repayment</option>
                    <option value="bulk">Bulk Repayment</option>
                </select>

                <div id="individualFields" class="repayment-fields">
                    <label for="loanId">Loan ID</label>
                    <input type="text" id="loanId" name="loanId" placeholder="Enter your loan ID">
                </div>

                <div id="groupFields" class="repayment-fields">
                    <label for="groupId">Group ID</label>
                    <input type="text" id="groupId" name="groupId" placeholder="Enter your group ID">

                    <div id="groupRepaymentContainer">
                        <div class="group-repayment">
                            <label for="memberLoanId">Member Loan ID</label>
                            <input type="text" name="memberLoanId[]" placeholder="Enter member loan ID" required>

                            <label for="memberAmount">Repayment Amount</label>
                            <input type="number" name="memberAmount[]" placeholder="Enter amount to repay" required>
                        </div>
                    </div>

                    <button type="button" id="addMemberBtn">Add Another Member</button>
                </div>

                <div id="bulkFields" class="repayment-fields">
                    <label for="fileUpload">Upload CSV File</label>
                    <input type="file" id="fileUpload" name="fileUpload" accept=".csv">
                </div>

                <label for="amount">Repayment Amount</label>
                <input type="number" id="amount" name="amount" placeholder="Enter total amount to repay" required>

                <label for="paymentMethod">Payment Method</label>
                <select id="paymentMethod" name="paymentMethod" required>
                    <option value="" disabled selected>Select payment method</option>
                    <option value="mobile_money">Mobile Money</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>

                <label for="repaymentDate">Repayment Date</label>
                <input type="date" id="repaymentDate" name="repaymentDate" required>

                <button type="submit">Submit Repayment</button>
            </form>
        </div>
    </div>

    <script src="\SUMMIT\javascript\repayment.js"></script>
</body>
</html>
