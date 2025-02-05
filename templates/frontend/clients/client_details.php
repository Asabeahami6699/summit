<?php 
session_start();

// Check if user is authenticated and get their role
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    // If user is not authenticated, redirect to login page
    header("Location: ../../../templates/frontend/index.php");
    exit;
}
$pageTitle = 'Client Details';
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
    width:50%;
    border: 1px solid #ccc; /* Optional border for better visibility */
    margin-bottom:30px;
}


.right-panel {
    flex: 1; /* Adjusts to take up equal space */
    background-color: #white; /* Light pink */
    padding: 10px;
    width:50%;
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
.form-group {
    display: flex;
  
    justify-content: space-between; /* Adds space between label and input */
    margin-bottom: 15px; /* Space between form groups */
}


label {
    flex: 0 0 140px; /* Sets a fixed width for the label */
    text-align: right ; /* Aligns the label text to the right */
    margin-right: 10px; /* Adds spacing between the label and input/span */
    min-width: 100px !important; /* Ensures labels align consistently */
}


span {
    flex: 1; /* Allows the span to take up remaining space */
    font-size: 13px; /* Optional: Adjust the font size for spans */
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

.inner-fieldsets {
    border: 1px solid #ccc;
    padding: 15px;
    width: 400px; /* Adjust width as needed */
    box-sizing: border-box;
    margin-bottom:20px;

}


input[type="number"] {
    -moz-appearance: textfield;
}
input[type="number"]::-webkit-outer-spin-button,
input[type="number"]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
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


    </style>
</head>
<body>
    <div class="loan-details-container">
        <div class="header">
            <div class="header-div-left">
                
                
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
                <button class="tab" data-target="#identification-content">identification</button>
                <button class="tab" data-target="#otherInfo-content">Other Info</button>
                <button class="tab" data-target="#businessInfo-content">Business/Employment</button>
                <button class="tab" data-target="#guarantors-content">Guarantors</button>
                <button class="tab" data-target="#beneficiary-content">Beneficiary</button>
                <button class="tab" data-target="#call-report-content">Call Report</button>
            </div>
        
            <!-- Tab Content -->
                <div class="tab-content">
                    <div id="overview-content" class="tab-panel active">
                        <!-- Left Panel: Borrower Details -->
                        <div id="overview-contents">
                            <div class="left-panel">
                            <img src="fetch_image.php?image_id=1" alt="client image"  style="max-width: 100px; max-height: 100px; float:right; ">
                                
                            <form id="loanDetailsForm">
                                    <legend>Loan Details</legend>
                                    <div class="fieldset-containers">
                                        <fieldset class="inner-fieldsets">
                                            <!-- Borrower Information -->
                                            <div class="form-group">
                                                <label for="name"><strong>Name:</strong></label>
                                                <span id="name">John Doe</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="accountNumber"><strong>Account Number:</strong></label>
                                                <span id="accountNumber">1234567890</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="loanCategory"><strong>Loan Category:</strong></label>
                                                <span id="loanCategory">Personal</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="loanPurpose"><strong>Loan Purpose:</strong></label>
                                                <span id="loanPurpose">Business Expansion</span>
                                            </div>
                                            <hr>
                                            
                                            <div class="form-group">
                                                <label for="contactInformation"><strong>Contact Information:</strong></label>
                                                <span id="contactInformation">+233 123 456 789</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="appliedOn"><strong>Applied On:</strong></label>
                                                <span id="appliedOn">15 Jan 2024</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="approvedBy"><strong>Approved By:</strong></label>
                                                <span id="approvedBy">approval@officer</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="disbursedBy"><strong>Disbursed By:</strong></label>
                                                <span id="disbursedBy">disbursed@officer</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="assignedOfficer"><strong>Assigned Officer:</strong></label>
                                                <span id="assignedOfficer">1234567890</span>
                                            </div>
                                        </fieldset>
                                        
                                    </div>
                                </form>

                            </div>

                            <!-- Right Panel: Loan Details -->
                            <div class="right-panel">
                                <form id="loanSummaryForm">
                                    <legend>Loan Summary</legend>
                                    <div class="fieldset-container">
                                        <fieldset class="inner-fieldset">
                                            <!-- Loan Summary Information -->
                                             <div class="form-group">
                                                <label for="groupName"><strong>Group Name:</strong></label>
                                                <span id="groupName">groupName</span>
                                            </div>
                                            <hr>
                                             <div class="form-group">
                                                <label for="groupRole"><strong>Group Role:</strong></label>
                                                <span id="groupRole">groupRole</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="loanAmountApproved"><strong>Loan Amount Approved:</strong></label>
                                                <span id="loanAmountApproved">GH₵10,000.00</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="loanAmountDisbursed"><strong>Loan Amount Disbursed:</strong></label>
                                                <span id="loanAmountDisbursed">GH₵10,000.00</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="loanInterestRate"><strong>Loan Interest Rate:</strong></label>
                                                <span id="loanInterestRate">12%</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="loanCharges"><strong>Loan Charges:</strong></label>
                                                <span id="loanCharges">GH₵500.00</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="loanCollateral"><strong>Loan Collateral:</strong></label>
                                                <span id="loanCollateral">GH₵5,000.00</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="outstandingBalance"><strong>Outstanding Balance:</strong></label>
                                                <span id="outstandingBalance">GH₵4,000.00</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="overdueAmount"><strong>Overdue Amount:</strong></label>
                                                <span id="overdueAmount">GH₵960.00</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="daysOverdue"><strong>Days Overdue:</strong></label>
                                                <span id="daysOverdue">15 Days</span>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="lastPaymentDate"><strong>Last Payment Date:</strong></label>
                                                <span id="lastPaymentDate">31 Jul 2023</span>
                                            </div>
                                        </fieldset>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="details-content" class="tab-panel">
                <fieldset>
                    <legend>Biographical Info</legend>

                    <!-- First Fieldset for essential information -->

                    <!-- Container to hold the two fieldsets side by side -->
                    <div class="fieldset-container">
                        <!-- First Fieldset for essential information -->
                        <fieldset class="inner-fieldset">
                            <div class="form-group">
                                <label for="firstName">First Name<span style="color: red;">*</span></label>
                                <span id="firstName" name="firstName">[Data from database]</span>
                            </div>
                            <div class="form-group">
                                <label for="lastName">Last Name <span style="color: red;">*</span></label>
                                <span id="lastName" name="lastName">[Data from database]</span>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender <span style="color: red;">*</span></label>
                                <span id="gender" name="gender">[Data from database]</span>
                            </div>
                            <div class="form-group">
                                <label for="mobileNumber">Mobile phone number <span style="color: red;">*</span></label>
                                <span id="mobileNumber" name="mobileNumber">[Data from database]</span>
                            </div>
                            <div class="form-group">
                                <label for="externalId">External ID</label>
                                <span id="externalId" name="externalId">[Data from database]</span>
                            </div>
                            <hr>
                            <br>
                            <div class="form-group">
                                <label for="dateOfBirth">Date of Birth <span style="color: red;">*</span></label>
                                <span id="dateOfBirth" name="dateOfBirth">[Data from database]</span>
                            </div>
                            <div class="form-group">
                                <label for="placeOfBirth">Place of Birth</label>
                                <span id="placeOfBirth" name="placeOfBirth">[Data from database]</span>
                            </div>
                            <div class="form-group">
                                <label for="nationality">Nationality</label>
                                <span id="nationality" name="nationality">[Data from database]</span>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <span id="email" name="email">[Data from database]</span>
                            </div>
                        </fieldset>
                    
                            <fieldset class="inner-fieldset">
                                
                                <div class="form-group">
                                    <label for="streetAddress">Street Address</label>
                                    <span id="streetAddress" name="streetAddress">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group"> 
                                    <label for="cityTown">City/Town</label>
                                    <span id="cityTown" name="cityTown">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="stateRegion">State/Region</label>
                                    <span id="stateRegion" name="stateRegion">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <span id="country" name="country">[Data from database]</span>
                                </div>
                                <hr>
                                <br>
                                <div class="form-group">
                                    <label for="digitalAddress">Digital Address</label>
                                    <span id="digitalAddress" name="digitalAddress">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="latitude">Latitude</label>
                                    <span id="latitude" name="latitude">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="longitude">Longitude</label>
                                    <span id="longitude" name="longitude">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="landmark">Landmark</label>
                                    <span id="landmark" name="landmark">[Data from database]</span>
                                </div>
                                </fieldset>
                                <img src="fetch_image.php?image_id=1" alt="client image"  style="max-width: 100px; max-height: 100px; float:right; ">
                            
                       
                   
                </fieldset>


                </div>
                <div id="identification-content" class="tab-panel"><fieldset>
                <legend>Client Identification</legend>
                <table>
                    <thead>
                        <tr>
                            <th>ID Type</th>
                            <th>ID Number</th>
                            <th>Issue Date</th>
                            <th>Expiry Date</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody id="membersTableBody">
                        <!-- Rows will be dynamically inserted here by JavaScript or server-side rendering -->
                    </tbody>
                </table>
            </fieldset>

                    
                </div>

                <div id="otherInfo-content" class="tab-panel">

                    <form id="otherInfo">
                        <fieldset>
                            <legend>otherInfo</legend>
                            <div class="fieldset-container">
                                <!-- First Fieldset for essential information -->
                                <fieldset class="inner-fieldset">
                                    <div class="form-group">
                                        <label for="gender">Marital Status</label>
                                        <span id="gender">gender</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="spouseName">Spouse Name</label>
                                        <span id="spouseName">belin</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="dateOfBirth">Date of Birth</label>
                                        <span id="dateOfBirth">date of birth</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="spouseOccupatoin">Spouse Occupation</label>
                                        <span id="spouseOccupatoin">spouse occupation</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="mobileNumber">Mobile number</label>
                                        <span id="mobileNumber">mobile number</span>
                                    </div>
                                    <hr>
                                    <br>
                                    <hr>
                                    <div class="form-group">
                                        <label for="spouceEmployerName">Spouse Employer’s Name</label>
                                        <span id="spouceEmployerName">spouse employer name</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="spouceEmployerAddress">Spouse Employer’s Address</label>
                                        <span id="spouceEmployerAddress">spouse employer address</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="spouceEmployerNumber">Spouse Employer’s Number</label>
                                        <span id="spouceEmployerNumber">spouse employer number</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="spouceEmployerTown">Spouse Employer’s Town</label>
                                        <span id="spouceEmployerTown">spouse employer town</span>
                                    </div>
                                </fieldset>

                                <!-- Second Fieldset for additional information -->
                                <fieldset class="inner-fieldset">
                                    <div class="form-group">
                                        <label for="familySze">Family size</label>
                                        <span id="familySze">family size</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="numberOfDependants">Number Of Dependants</label>
                                        <span id="numberOfDependants">number of dependants</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="numberOfChildren">Number Of Children</label>
                                        <span id="numberOfChildren">number of children</span>
                                    </div>
                                    <hr>
                                    <br>
                                    <hr>
                                    <div class="form-group">
                                        <label for="religion">Religion</label>
                                        <span id="religion">religion</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="placeOfWorship">Place of worship</label>
                                        <span id="placeOfWorship">place of worship</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="townOfWorship">Town Of worship</label>
                                        <span id="townOfWorship">town of worship</span>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="form-group">
                                        <label for="tenantPropertyOwner?">Tenant/Property Owner?</label>
                                        <span id="tenantPropertyOwner?">TenantPropertyOwner?</span>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="groupName">Group Name</label>
                                        <span id="groupName">Group Name from db</span>
                                    </div>
                                    <hr>

                                </fieldset>
                            </div>
                        </fieldset>
                    </form>

                </div>
                <div id="businessInfo-content" class="tab-panel">
                    
                <fieldset>
                        <legend>Business status</legend>
                        <!-- Container to hold the two fieldsets side by side -->
                        <div class="fieldset-container">
                            <!-- First Fieldset for essential information -->
                            <fieldset class="inner-fieldset">
                                <div class="form-group">
                                    <label for="businessName">Business Name </label>
                                    <span id="businessName" name="businessName">[Data from database]</span>
                                </div> 
                                <hr> 
                                <div class="form-group">
                                    <label for="natureOfBusiness">Nature of Business  </label>
                                    <span id="natureOfBusiness" name="natureOfBusiness">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="businessStructure">Business Structure</label>
                                    <span id="businessStructure" name="businessStructure">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="businessStartedDate">Business started date </label>
                                    <span id="businessStartedDate" name="businessStartedDate">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="businessPhoneNumber">Business Phone Number </label>
                                    <span id="businessPhoneNumber" name="businessPhoneNumber">[Data from database]</span>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label for="businessIncomeLevel">Business Income Level</label>
                                    <span id="businessIncomeLevel" name="businessIncomeLevel">[Data from database]</span>
                                </div>
                            </fieldset>

                            <!-- Second Fieldset for additional information -->
                            <fieldset class="inner-fieldset">
                                <div class="form-group">
                                    <label for="businessAddress">Business Address </label>
                                    <span id="businessAddress" name="businessAddress">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="businessTown">Business Town </label>
                                    <span id="businessTown" name="businessTown">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="businessRegion">Business Region </label>
                                    <span id="businessRegion" name="businessRegion">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="businessLocation">Business Location </label>
                                    <span id="businessLocation" name="businessLocation">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="employmentType">Employment Type </label>
                                    <span id="employmentType" name="employmentType">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="income">Income </label>
                                    <span id="income" name="income">[Data from database]</span>
                                </div>
                               

                            </fieldset>
                        </div>
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
                </div>
                <div id="beneficiary-content" class="tab-panel">
                <form id="beneficiaryForm">
                    <fieldset>
                        <legend>Beneficiary Details</legend>
                        <div class="fieldset-container">
                            <fieldset class="inner-fieldset">
                                <div class="form-group">
                                    <label for="name">Beneficiary Name*</label>
                                    <span id="name" name="name">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="phone">Beneficiary Phone Number*</label>
                                    <span id="phone" name="phone">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="relationship">Relationship Type*</label>
                                    <span id="relationship" name="relationship">[Data from database]</span>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <label for="amount">Amount Of Legacy</label>
                                    <span id="amount" name="amount">[Data from database]</span>
                                </div>
                            </fieldset>

                            <fieldset class="inner-fieldset">
                                <div class="form-group">
                                    <label for="address">Beneficiary Address</label>
                                    <span id="address" name="address">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="town">Beneficiary Town</label>
                                    <span id="town" name="town">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="region">Beneficiary Region</label>
                                    <span id="region" name="region">[Data from database]</span>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="country">Beneficiary Country</label>
                                    <span id="country" name="country">[Data from database]</span>
                                </div>
                            </fieldset>
                        </div>
                    </fieldset>
                </form>



                </div>
                <div id="call-report-content" class="tab-panel">Call Report content goes here.</div>
            </div>
        </div>
        
      
                

    </div>
    <script>

    



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
