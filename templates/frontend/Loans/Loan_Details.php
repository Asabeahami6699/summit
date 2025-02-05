<?php 
session_start();

// Check if user is authenticated and get their role
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    // If user is not authenticated, redirect to login page
    header("Location: ../../../templates/frontend/index.php");
    exit;
}
$pageTitle = 'Loan Details';
include '../navbar.php';
include '../header_bar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>echo $pageTitle;</title>
    <link rel="stylesheet" href="styles.css">


    <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: skyblue;
}

.loan-details-container {
    margin: 20px;
    max-width: 1400px;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
/* Header */
.header {
    display: flex;
    justify-content: space-between;
    padding: 10px;
    background-color: #ffffff;
    border-bottom: 1px solid #ddd;
    flex-wrap: wrap; /* Enable wrapping for smaller screens */
}

.client-info h2 {
    margin: 0;
    color: #000000;
}

.client-info p {
    margin: 5px 0;
    color: #555;
}

/* Loan Actions */
.loan-actions .btn {
    margin-left: 10px;
    padding: 10px 15px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background-color: #007bff;
    color: #fff;
}

.loan-actions .repayment {
    background-color: #28a745;
}

/* Amounts Section */
.amounts {
    display: flex;
    justify-content: space-around;
    padding: 20px;
    background-color: #fff;
    flex-wrap: wrap; /* Enable wrapping for smaller screens */
}

.amount-item {
    text-align: center;
    font-size: 14px;
    margin-bottom: 10px;
}

.amount-item p {
    margin: 0;
    color: #000000;
}

.amount-item h3 {
    margin: 10px 0 0;
    font-size: 20px;
    color: #000000;
}

.amount-item.overdue h3 {
    color: red;
}

.amount-item .overdue-date {
    font-size: 12px;
    color: #000000;
}

/* Tabs Container */
.tabs-container {
    font-family: Arial, sans-serif;
}

/* Tabs Navigation */
.tabs {
    display: flex;
    border-bottom: 2px solid #ddd;
    margin-bottom: 10px;
    flex-wrap: wrap; /* Enable wrapping for smaller screens */
}

.tab {
    padding: 10px 20px;
    border: none;
    background: #f9f9f9;
    cursor: pointer;
    transition: background 0.3s;
}

.tab.active {
    background: gray;
    color: rgb(0, 0, 0);
    border-bottom: 2px solid #007bff;
    font-weight: bold;
}

.tab:hover {
    background: #ddd;
}

/* Tab Panels */
.tab-content {
    padding: 15px;
    border: 1px solid #ddd;
    background: #fff;
}

.tab-panel {
    display: none;
}

.tab-panel.active {
    display: block;
}

/* Call Report Button */
.call-report {
    padding: 20px;
    text-align: center;
}

.add-call-report-btn {
    padding: 10px 15px;
    font-size: 14px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.add-call-report-btn:hover {
    background-color: #0056b3;
}

/* Vertical Line */
.vertical-line {
    border-left: 2px solid #000; /* Thickness and color of the line */
    height: 100px; /* Height of the line */
    margin-left: 250px;
}

/* Left Section */
.header-div-left {
    display: flex;
    flex-direction: column;
    justify-content: center;
}

/* Right Section */
.header-div-right {
    display: flex;
    flex-direction: row; /* Arrange items horizontally */
    align-items: center;
    gap: 20px; /* Add spacing between items */
}
#overview-contents {
    display: flex;
    gap: 1px; /* Adds space between the two panels */
}
.left-panel {
    flex: 1; /* Adjusts to take up equal space */
    background-color: white; /* Light blue */
    padding: 10px;
    border: 1px solid #ccc; /* Optional border for better visibility */
    text-align: left; /* Aligns text to the right */
    direction: rtl; /* Ensures text aligns straight to the right edge */
    margin-bottom:30px;
}


.right-panel {
    flex: 1; /* Adjusts to take up equal space */
    background-color: #white; /* Light pink */
    padding: 10px;
    border: 1px solid #ccc; /* Optional border for better visibility */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}
th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}
th {
    background-color: #f2f2f2;
}
.fieldset-container {
    display: flex;
    justify-content: center; /* Align items to the start */
    gap: 20px; /* Controls spacing between the elements */
    min-width: 800px;
}

.inner-fieldset {
    border: 1px solid #ccc;
    padding: 15px;
    width: 400px; /* Adjust width as needed */
    box-sizing: border-box;
    margin-bottom: 20px; /* Only for vertical spacing */
    margin-left: 0; /* Reset margin-left */
}

/* Responsive Design */
@media (max-width: 768px) {
    .header {
        flex-direction: column; /* Stack the header content */
        align-items: center;
    }

    .header-div-left {
        align-items: center; /* Center-align the text */
        text-align: center;
        margin-bottom: 10px; /* Add spacing between sections */
    }

    .loan-actions .btn {
        margin: 5px 0; /* Reduce spacing between buttons */
        width: 100%; /* Make buttons full width */
    }

    .vertical-line {
        display: none; /* Hide the vertical line on smaller screens */
    }

    .header-div-right {
        flex-direction: column; /* Stack items vertically */
        align-items: center; /* Center-align items */
    }

    .amount-item h3 {
        font-size: 18px; /* Slightly smaller text size */
    }

    .tabs {
        flex-direction: column; /* Stack tabs vertically */
    }

    .tab {
        width: 100%; /* Make tabs full width */
        text-align: center; /* Center-align text */
    }
}

@media (max-width: 480px) {
    .amount-item h3 {
        font-size: 16px; /* Further reduce font size */
    }

    .amount-item p {
        font-size: 12px; /* Reduce font size for labels */
    }

    .loan-actions .btn {
        font-size: 12px; /* Smaller font for buttons */
    }
}
.border-box {
  border: 3px solid skyblue; /* Black border */
  border-radius: 10px;     /* Rounded corners */
  text-align: center;      /* Centered text */
  color: black;            /* Text color */
  font-weight: bold;       /* Bold font style */
  background-color: white; /* Light background */
  width: 115px;
  height:40px; }

  .border-box:hover{
    box-shadow: 2px 2px 8px black; /* Subtle shadow */
    cursor:pointer;

  }
  .border-box-loan{
  border: 3px solid skyblue; /* Black border */
  border-radius: 10px;     /* Rounded corners */
  text-align: center;      /* Centered text */
  color: black;            /* Text color */
  font-weight: bold;       /* Bold font style */
  background-color: white; /* Light background */
  width: 70px;
  height:40px; }

  .border-box-loan:hover{
    box-shadow: 2px 2px 8px black; /* Subtle shadow */
    cursor:pointer;

  }
  .popup {
    display: none;
    position: fixed;
    top: 30%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: white;
    border: 1px solid #ccc;
    font-size: 16px;
    padding: 10px;
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
    z-index: 1000;
    width: 400px;
}
.overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    z-index: 999;
    display: none;
    backdrop-filter: blur(10px);
}
.form-group, .form-group-textarea {
    display: flex;                /* Use flexbox for horizontal alignment */
    justify-content: space-between; /* Space between label and input */
    align-items: center;          /* Align items vertically */
    margin-bottom: 15px;          /* Add spacing between form groups */
}

.form-group label, .form-group-textarea label {
    font-weight: bold;            /* Make labels bold */
    font-size: 14px;              /* Adjust font size */
    flex: 1;                      /* Allow labels to take up equal space */
    text-align: left;             /* Align text to the left */
}

.form-group input, 
.form-group select, 
.form-group-textarea textarea {
    flex: 2;                      /* Allow inputs to take more space */
    padding: 8px 10px;            /* Add padding for a better look */
    border: 1px solid #ccc;       /* Add border */
    border-radius: 5px;           /* Rounded corners */
    font-size: 14px;              /* Font size */
    box-sizing: border-box;       /* Include padding in width calculation */
    width: 100%;                  /* Ensure consistent width */
}

.form-group-textarea textarea {
    resize: none;                 /* Prevent textarea resizing */
    height: 100px;                /* Set a fixed height for the textarea */
}

.form-group input:focus, 
.form-group select:focus, 
.form-group-textarea textarea:focus {
    outline: none;                /* Remove default focus outline */
    border-color: #007bff;        /* Highlight border on focus */
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add a glow effect */
}


.button-group {
    display: flex;                 /* Use flexbox for horizontal alignment */
    justify-content: space-between; /* Align buttons at opposite ends */
    margin-top: 20px;              /* Add some margin at the top */
}

.button-group button {
    padding: 10px 20px;            /* Add padding for better appearance */
    background-color: skyblue;     /* Button background color */
    border: none;                  /* Remove default border */
    border-radius: 8px;            /* Add rounded corners */
    border: 3px solid skyblue;     /* Border color same as background */
    color: white;                  /* Button text color */
    cursor: pointer;               /* Add pointer cursor on hover */
    font-size: 14px;               /* Font size */
    flex: 0;                       /* Prevent buttons from stretching */
}
h4 {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center;     /* Center vertically */
    text-align: center;      /* Center text */
   
}

.button-group button:hover {
    background-color: #0056b3;     /* Darker shade for hover effect */
}


input[type="number"] {
    -moz-appearance: textfield;
}
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

    </style>
</head>
<body>
    <div class="loan-details-container">
        <div class="header">
            <div class="header-div-left">
                
                <div class="loan-actions">
                    <button class="border-box-loan">Loan</button>
                    <button class="border-box" id="addRepaymentdetails">Repayment</button>
                </div>
                <div class="client-info">
                    <p><strong>ABDUL RAHMAN KODWO MUSAH</strong></p>
                    <p>Client #: ####### </p>
                    <p>🟩Loan Type (Loan Account #: ##########)</p>
                </div>
            </div>
            
            <div class="vertical-line"></div>
            
            
            <div class="header-div-right"> 
                <div class="amount-item">
                    <p><strong>Loan Balance</strong></p>
                    <h5>GH₵960.00</h5>
                </div>
                <div class="amount-item">
                    <p>Loan Amount Paid</p>
                    <h5>GH₵1,740.00</h5>
                </div>
                <div class="amount-item">
                    <p>Fees/Penalties Paid</p>
                    <h5>GH₵0.00</h5>
                </div>
                <div class="amount-item overdue">
                    <p>Amount Overdue</p>
                    <h5>GH₵960.00</h5>
                    <p class="overdue-date">(Since 31 JUL 2023)</p>
                </div>
            </div>
        </div>

        <div class="tabs-container">
            <!-- Tabs Navigation -->
            <div class="tabs">
                <button class="tab active" data-target="#overview-content">Overview</button>
                <button class="tab" data-target="#details-content">Details</button>
                <button class="tab" data-target="#figures-content">Figures</button>
                <button class="tab" data-target="#repayment-schedule-content">Repayment Schedule</button>
                <button class="tab" data-target="#transactions-content">Transactions</button>
                <button class="tab" data-target="#collateral-content">Collateral</button>
                <button class="tab" data-target="#guarantors-content">Guarantors</button>
                <button class="tab" data-target="#charges-content">Charges</button>
                <button class="tab" data-target="#overdue-charges-content">Overdue Charges</button>
                <button class="tab" data-target="#call-report-content">Call Report</button>
            </div>
        
            <!-- Tab Content -->
            <div class="tab-content">
                 <div id="overview-content" class="tab-panel active">

    <!-- Left Panel: Borrower Details -->
                    <div id="overview-contents">
                        <div class="left-panel">
                            <h3>Borrower Details</h3>
                            <hr>
                            <p><strong>Name:</strong> John Doe</p>
                            <p><strong>Account Number:</strong> 1234567890</p>
                            <p><strong>Loan Cartegory:</strong> 1234567890</p>
                            <p><strong>Loan Purpose:</strong> 1234567890</p>
                            <p><strong>Contact Information:</strong> +233 123 456 789</p>
                            <p><strong>Applied On:</strong> date of application</p>
                            <p><strong>Approved By:</strong> approval@officer</p>
                            <p><strong>Disbursed By:</strong> disbursed@officer</p>
                            <p><strong>Assigned Officer:</strong> 1234567890</p>
                        </div>

                        <!-- Right Panel: Loan Details -->
                        <div class="right-panel">
                            <h3>Loan Summary</h3>
                            <hr>
                     
                            <p><strong>Loan Amount Approved:</strong> GH₵10,000.00</p>
                            <p><strong>Loan Amount Disbursed:</strong> GH₵10,000.00</p>
                            <p><strong>Loan Interest Rate:</strong> GH₵10,000.00</p>
                            <p><strong>Loan Charges:</strong> GH₵10,000.00</p>
                            <p><strong>Loan Collateral</strong> GH₵10,000.00</p>
                            <p><strong>Outstanding Balance:</strong> GH₵4,000.00</p>
                            
                             
                            <br>


                           
                            <p><strong>Overdue Amount:</strong> GH₵960.00</p>
                            <p><strong>Days Overdue:</strong> 15 Days</p>
                            <p><strong>Last Payment Date:</strong> 31 Jul 2023</p>
                        </div>
                    </div>
                   
                </div>

                <div id="details-content" class="tab-panel">Details content goes here.

                </div>
                <div id="figures-content" class="tab-panel">Figures content goes here.</div>
                <div id="repayment-schedule-content" class="tab-panel">
                <fieldset>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Principal Due</th>
                                                <th>Principal Balance</th>
                                                <th>Interest</th>
                                                <th>Total Due</th>
                                            </tr>
                                        </thead>
                                        <tbody id="repaymentTableBody">
                                            <!-- Rows will be dynamically inserted here by JavaScript -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">TOTAL</td>
                                                <td id="totalPrincipalDue">0.00</td>
                                                <td></td>
                                                <td id="totalInterest">0.00</td>
                                                <td id="totalDue">0.00</td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </fieldset>
                </div>
                <div id="transactions-content" class="tab-panel">Transactions content goes here.</div>
                <div id="collateral-content" class="tab-panel">
                <fieldset>
                     <legend>Collateral</legend>
                     
                        <table>
                            <thead>
                                <tr>
                                    <th>Collatera type</th>
                                    <th>Collateral value</th>
                                    <th>Collateral document</th>
                                    <th>Description</th>

                                </tr>
                            </thead>
                            <tbody id="collateralTableBody">
                                <!-- Rows will be dynamically inserted here by JavaScript -->
                            </tbody>
                        </table>

                </fieldset>
                </div>
                <div id="guarantors-content" class="tab-panel">
                <fieldset>
                     <legend>Guarantor</legend>
                     
                        <table>
                            <thead>
                            <tr>
                                            <th>Relationship</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Phone Number</th>
                                            <th>ID Type</th>
                                            <th>Unique ID Number</th>
                                        </tr>
                            </thead>
                            <tbody id="guarantorTableBody">
                                <!-- Rows will be dynamically inserted here by JavaScript -->
                            </tbody>
                        </table>

                </fieldset>
                </div>
                <div id="charges-content" class="tab-panel">
                <fieldset class="fieldset-container">
                                       <legend>Charges/Penalty</legend>
                                          
                                                <fieldset class="inner-fieldset" id="charges">   
                                                <legend>charges</legend>
                                                    <!-- Charges Dropdown -->
                                                    
                                                        
                                                        <div class="form-group">
                                                            <label for="processingFee">Processing Fee:</label>
                                                            <span id="processingFee">processingFee from db</span>
                                                            
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="maintenanceFee">Maintenance Fee:</label>
                                                            <span id="processingFee">processingFee from db</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="otherFee">Other Fee:</label>
                                                            <span id="processingFee">processingFee from db</span>
                                                        </div>
                                                  
                                                </fieldset> 
                                                <fieldset class="inner-fieldset" id="penalties">   
                                                   <legend>penalties</legend>
                                                   <!-- Charges Input Fields -->  
                                                            <div  class="form-group">
                                                                <label for="loanDefault">Loan Default:</label>
                                                                <span id="processingFee">processingFee from db</span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="latePayment">Late Payment:</label>
                                                                <span id="processingFee">processingFee from db</span>
                                                            </div>
                                                       


                                                </fieldset> 
                                            
                            </fieldset>
                </div>
                <div id="overdue-charges-content" class="tab-panel">Overdue Charges content goes here.</div>
                <div id="call-report-content" class="tab-panel">Call Report content goes here.</div>
            </div>
        </div>
        
      
                <div id="overlay" class="overlay" style="display: none;"></div>
                <div class="popup" id="RepaymentForm" style="display: none;">
                    <h4>Add Repayment Details</h4>
                    <hr>
                    <form id="repaymentForm">
                    <div class="form-group">
                    <label for="RrepaymentType">Repayment Type <span style="color: red;">*</span></label>
                    <select id="RrepaymentType" name="RrepaymentType" required>
                        <option value="" disabled selected>-- Select --</option>
                        <option value="check">Check</option>
                        <option value="mobileMoney">Mobile Money</option>
                        <option value="cash">Cash</option>
                        <option value="assets">Assets</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Repaymentamount">Repayment Amount <span style="color: red;">*</span></label>
                    <input type="number" id="Repaymentamount" name="Repaymentamount" required>
                </div>

                <div class="form-group-textarea">
                    <label for="description">Description</label>
                    <textarea id="description" name="description"></textarea>
                </div>


                <div class="button-group">
                    <button type="button" id="closeGroupReg" onclick="hideRepaymentForm()">Cancel</button>
                    <button type="button" id="confirmButtonGroupReg" onclick="SubmitRepaymentdetails()">Submit</button>
                </div>

                    </form>
                    <hr>
                </div>

    </div>
    <script>

    
document.getElementById('addRepaymentdetails').addEventListener('click', () => {
    document.getElementById('overlay').style.display = 'block';
    document.getElementById('RepaymentForm').style.display = 'block';
});

function hideRepaymentForm() {
    document.getElementById('RepaymentForm').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

function SubmitRepaymentdetails() {
    alert("Repayment details submitted!");
    hideRepaymentForm();
}


        // Select all tabs and panels
        const tabs = document.querySelectorAll('.tab');
        const panels = document.querySelectorAll('.tab-panel');
    
        // Loop through each tab to add click events
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove the 'active' class from all tabs and panels
                tabs.forEach(t => t.classList.remove('active'));
                panels.forEach(panel => panel.classList.remove('active'));
    
                // Add 'active' class to the clicked tab and its corresponding panel
                tab.classList.add('active');
                const targetPanel = document.querySelector(tab.dataset.target);
                targetPanel.classList.add('active');
            });
        });
    </script>
    
    
</body>
</html>
