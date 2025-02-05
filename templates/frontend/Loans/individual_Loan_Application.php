<?php 
$pageTitle = 'Individual Loan Application';
include '../navbar.php';
include '../header_bar.php';


// Include the database connection file
include '../../../db_connection.php';



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><h1><?php echo $pageTitle; ?></h1></title>
    <link rel="stylesheet" href="\summit\stylesheet\loans\individual_client_loan_appli.css">
</head>

<style>

.fieldset-container {
    display: flex;
    justify-content: space-between; /* Adds space between the fieldsets */
    min-width: 800px;
    
}

.inner-fieldset {
    border: 1px solid #ccc;
    padding: 15px;
    width: 60%; /* Adjust width as needed */
    box-sizing: border-box;
}
.inner-fieldset-charges-penalty {
    border: 1px solid #ccc;
    padding: 15px;
    width: 48%; /* Adjust width as needed */
    box-sizing: border-box;
}
h4 {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center;     /* Center vertically */
    text-align: center;      /* Center text */
   
}
#beneficiaryDetailsFieldset {
    display: flex;
    flex-direction: column; /* Arrange items in a vertical column */
    gap: 15px; /* Space between each item */
   
  
}
/* Style each detail item to align elements horizontally */
.detail-item {
    display: flex; /* Use flexbox to align items */
    justify-content: space-between; /* Space out items to opposite sides */
    margin-bottom: 10px; /* Add some space between each item */
}

/* Align the label (strong text) to the right */
.detail-label {
    font-weight: bold; /* Make it bold */
    min-width: 140px; /* Set a minimum width to align the labels */
    text-align: right; /* Align the text to the right */
    margin-right: 10px; /* Add some space between the label and the data */
    margin-bottom: 10px;
}

/* Style for the data */
.detail-data {
    flex-grow: 1; /* Allow the data to take up the remaining space */
}
.center-form {
        display: flex;
        flex-direction: column;
        gap: 1px; /* Space between form groups */
        max-width: 500px;
        margin: 0 auto; /* Center the form horizontally */
    }
.delete-icon {
    font-size: 20px;
    color: black;
    margin-left: 10px;
}
.delete-icon:hover {
    cursor: pointer;
    opacity: 1.7;
    color:red
}

    








</style>
<body>
    <div class="cm_container">
        <div class="cm_main">
           
            <section class="cm_client-list">

            <div class="form-container">
        <!-- Progress Bar Container -->
        <div class="progress-bar">
            <div class="step">
                <div class="circle">1</div>
                <div class="line"></div>
                <p class="font-size">Terms</p>
            </div>
            <div class="step">
                <div class="circle">2</div>
                <div class="line"></div>
                <p class="font-size">Settings</p>
            </div>
            <div class="step">
                <div class="circle">3</div>
                <div class="line"></div>
                <p class="font-size">Charges/Penalty</p>
            </div>
            <div class="step">
                <div class="circle">4</div>
                <div class="line"></div>
                <p class="font-size">Collateral</p>
            </div>
            <div class="step">
                <div class="circle">5</div>
                <div class="line"></div>
                <p class="font-size">Guarantors</p>
            </div>
            <div class="step">
                <div class="circle">6</div>
                <div class="line"></div>
                <p class="font-size">Repayment Period</p>
            </div>
            <div class="step">
                <div class="circle">7</div>
                <p class="font-size">Preview</p>
            </div>
        </div>

                <!-- Step 1: Group Details -->
                <div class="form-step active">
                    <div class="form-section">
                       
                            <!-- Step 1 -->
                            <div class="form-step active" id="step-1">
                                
                               
                               
                            <fieldset>
                                <legend>Terms</legend>
                                <div class="center-form">
                                    <fieldset class="inner-fieldsets">
                                        <!-- Loan Type -->
                                        <div class="form-group">
                                            <label for="loanType">Loan Category <span style="color: red;">*</span></label>
                                            <select id="loanType" name="loanType" required>
                                                <option value="" disabled selected>Select Loan Type</option>
                                                <option value="salaryLoan">Salary Loan</option>
                                                <option value="fastTrack">Fast Track</option>
                                                <option value="funeralLoan">Funeral Loan</option>
                                                <option value="weeklyLoan">Weekly Loan</option>
                                                <option value="otherLoan">Other Loans</option>
                                            </select>
                                        </div>

                                        <!-- Loan Amount -->
                                        <div class="form-group">
                                            <label for="loanAmount">Loan Amount <span style="color: red;">*</span></label>
                                            <input type="number" id="loanAmount" name="loanAmount" placeholder="Enter Loan Amount" required>
                                        </div>

                                        <!-- Loan Term -->
                                        <div class="form-group">
                                            <label for="loanTerm">Loan Term <span style="color: red;">*</span></label>
                                            <input type="number" id="loanTerm" name="loanTerm" placeholder="Enter Loan Term (weeks)" required>
                                        </div>

                                        <!-- Repayment Frequency -->
                                        <div class="form-group">
                                            <label for="repaymentFrequency">Repayment Every <span style="color: red;">*</span></label>
                                            <select id="repaymentFrequency" name="repaymentFrequency" required>
                                                <option value="week">Week</option>
                                                <option value="month">Month</option>
                                            </select>
                                        </div>

                                        <!-- Interest Rate -->
                                        <div class="form-group">
                                            <label for="interestRate">Interest Rate (%) <span style="color: red;">*</span></label>
                                            <input type="number" id="interestRate" name="interestRate" placeholder="Enter Interest Rate" required>
                                        </div>

                                        <!-- First Repayment Date -->
                                        <div class="form-group">
                                            <label for="firstRepayment">First Repayment Date <span style="color: red;">*</span></label>
                                            <input type="date" id="firstRepayment" name="firstRepayment" required>
                                        </div>

                                        <!-- External ID -->
                                        <div class="form-group">
                                            <label for="externalID">External ID</label>
                                            <input type="text" id="externalID" name="externalID">
                                        </div>
                                    </fieldset>
                                </div>
                            </fieldset>
                                    

                                </fieldset>
                           
                        
                                
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(1)">Next</button>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="form-step" id="step-2">
                                <fieldset>
                                    <legend>Settings</legend>

                                    <div class="center-form">
                                        <fieldset class="inner-fieldsets">
                                            <!-- Loan Officer Field -->


                                            <!-- Branch Name Field -->
                                            <div class="form-group">
                                                <label for="branchName">Branch Name <span style="color: red;">*</span></label>
                                                <select id="branchName" name="branchName" required>
                                                    <option value="" disabled selected>Select Branch</option>
                                                    <?php
                                                    // Fetch all branches from the database
                                                    $query = "SELECT branch_name FROM branch"; // Assuming the table is named 'branch'
                                                    $result = $conn->query($query);

                                                    // Check if the query returned any results
                                                    if ($result->num_rows > 0) {
                                                        // Loop through the results and create an option for each branch
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<option value='" . $row['branch_name'] . "'>" . $row['branch_name'] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option value=''>No branches available</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="loanOfficer">Loan Officer</label>
                                                <select id="loanOfficer" name="loanOfficer" required>
                                                    <option value="" disabled selected>Assigned officer</option>
                                                    <?php
                                                    // Query to get loan officers (assuming 'role' field identifies loan officers)
                                                    $query = "SELECT firstname, lastname FROM users WHERE role = 'loan_Officer'"; 
                                                    $result = $conn->query($query);

                                                    // Check if the query returned any results
                                                    if ($result->num_rows > 0) {
                                                        // Loop through the results and create an option for each loan officer
                                                        while ($row = $result->fetch_assoc()) {
                                                            $fullName = $row['firstname'] . ' ' . $row['lastname']; // Combine first and last names
                                                            echo "<option value='" . $fullName . "'>" . $fullName . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option value=''>No loan officers available</option>";
                                                    }
                                                    ?>
                                                </select>
                                            </div>

                                            <!-- Loan Purpose Field -->
                                            <div class="form-group">
                                                <label for="loanPurpose">Loan Purpose <span style="color: red;">*</span></label>
                                                <select id="loanPurpose" name="loanPurpose" required>
                                                    <option value="" disabled selected>Select Loan Type</option>
                                                    <option value="trade">Trade</option>
                                                    <option value="agriculture">Agriculture</option>
                                                    <option value="education">Education</option>
                                                    <option value="healthcare">Healthcare</option>
                                                    <option value="construction">Construction</option>
                                                    <option value="transportation">Transportation</option>
                                                    <option value="technology">Technology</option>
                                                    <option value="hospitality">Hospitality</option>
                                                    <option value="personal">Personal</option>
                                                </select>
                                            </div>

                                            <!-- Principal Grace Period Field -->
                                            <div class="form-group">
                                                <label for="gracePeriodPrincipal">Principal Grace Period</label>
                                                <input type="number" id="gracePeriodPrincipal" name="gracePeriodPrincipal">
                                            </div>

                                            <!-- Interest Grace Period Field -->
                                            <div class="form-group">
                                                <label for="gracePeriodInterest">Interest Grace Period</label>
                                                <input type="number" id="gracePeriodInterest" name="gracePeriodInterest">
                                            </div>

                                            <!-- Submission Date Field -->
                                            <div class="form-group">
                                                <label for="submissionDate">Submission Date <span style="color: red;">*</span></label>
                                                <input type="date" id="submissionDate" name="submissionDate" required value="2024-11-08">
                                            </div>

                                            <!-- Disbursement Date Field -->
                                            <div class="form-group">
                                                <label for="disbursementDate">Disbursement Date <span style="color: red;">*</span></label>
                                                <input type="date" id="disbursementDate" name="disbursementDate" required value="2024-11-08">
                                            </div>
                                        </fieldset>
                                    </div>
                                </fieldset>

                                <span class="error-message"></span>

                                <div class="back-btn">
                                    <button type="button" class="back-button" onclick="prevStep(2)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(2)">Next</button>
                                </div>
                            </div>


                            <!-- Step 3 -->
                            <div class="form-step" id="step-3">
                                
                               
                                    
                            <fieldset class="fieldset-container">
                                       <legend>Charges/Penalty</legend>
                                          
                                                <fieldset class="inner-fieldset-charges-penalty" id="charges">   
                                                <legend>charges</legend>
                                                    <!-- Charges Dropdown -->
                                                    
                                                        
                                                        <div class="form-group">
                                                            <label for="processingFee">Processing Fee:</label>
                                                            <input type="number" id="processingFee" name="processingFee" placeholder="Enter Processing Fee" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="maintenanceFee">Maintenance Fee:</label>
                                                            <input type="number" id="maintenanceFee" name="maintenanceFee" placeholder="Enter Maintenance Fee" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="otherFee">Other Fee:</label>
                                                            <input type="number" id="otherFee" name="otherFee" placeholder="Enter Other Fee">
                                                        </div>
                                                  
                                                </fieldset> 
                                                <fieldset class="inner-fieldset-charges-penalty" id="penalties">   
                                                   <legend>penalties</legend>
                                                   <!-- Charges Input Fields -->  
                                                            <div  class="form-group">
                                                                <label for="loanDefault">Loan Default:</label>
                                                                <input type="number" id="loanDefault" name="loanDefault" placeholder="Enter Loan Default Penalty" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="latePayment">Late Payment:</label>
                                                                <input type="number" id="latePayment" name="latePayment" placeholder="Enter Late Payment Penalty" required>
                                                            </div>
                                                       


                                                </fieldset> 
                                            
                            </fieldset>
                                    
                                <div class="back-btn">
                                <button type="button" class="back-button" onclick="prevStep(3)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(3)">Next</button>
                                </div>
                            </div>

                            <div id="overlay" class="overlay" style="display: none;"></div>

                            <!-- Step 4 -->
                            <div class="form-step" id="step-4">
                                
                                
                            <fieldset>
                                <legend>Collateral</legend>

                                <div class="center-form">
                                    <!-- Container to hold the two fieldsets side by side -->
                                    <div class="fieldset-container">
                                        <!-- Fieldset for essential information -->
                                        <fieldset class="inner-fieldset">
                                            <div class="form-group">
                                                <label for="collateralType">Collateral Type <span style="color: red;">*</span></label>
                                                <select id="collateralType" name="collateralType" required>
                                                    <option value="" disabled selected>-- Select --</option>
                                                    <option value="cash">Cash</option>
                                                    <option value="land">Land</option>
                                                    <option value="house">House</option>
                                                    <option value="store">Store</option>
                                                    <option value="asset">Asset</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="collateralValue">Collateral Value <span style="color: red;">*</span></label>
                                                <input type="number" id="collateralValue" name="collateralValue" required>
                                            </div>

                                            <div class="form-group" id="collateralDocumentGroup">
                                                <label for="collateralDocument">Collateral Document</label>
                                                <input type="file" id="collateralDocument" name="collateralDocument">
                                            </div>

                                            <div class="form-group-textarea" >
                                                <label for="description">Description</label>
                                                <textarea id="description" name="description"></textarea>
                                            </div>

                                        </fieldset>
                                    </div>
                                </div>
                            </fieldset>

  
                                <div class="back-btn">
                                <button type="button" class="back-button" onclick="prevStep(4)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(4)">Next</button>
                                </div>
                            </div>

                            <!-- Step 5 -->
                            <div class="form-step" id="step-5">
                                  <!-- First Fieldset for essential information -->
                                     
                                        <fieldset>
                                            <legend>Guarantor</legend>

                                            <button type="button" class="add-member" id="AddGuarantor">+ Add Guarantor</button>
                                            
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


                                        <div class="popup" id="guarantorRegForm" style="display: none;">
                                            <h4>Add Guarantor</h4>
                                            <hr>
                                           

                                            <form id="groupRegFormDetails">

<div class="form-group">
    <label for="relationship">Relationship <span style="color: red;">*</span></label>
    <select id="relationship" name="relationship" required>
        <option value="" disabled selected>-- Select --</option>
        <option value="parent">Parent</option>
        <option value="guardian">Guardian</option>
        <option value="sibling">Sibling</option>
        <option value="spouse">Spouse</option>
        <option value="friend">Friend</option>
    </select>
</div>

<div class="form-group">
    <label for="firstName">First Name<span style="color: red;">*</span></label>
    <input type="text" id="firstName" name="firstName" required>
</div>

<div class="form-group">
    <label for="lastName">Last Name<span style="color: red;">*</span></label>
    <input type="text" id="lastName" name="lastName" required>
</div>

<div class="form-group">
    <label for="gender">Gender <span style="color: red;">*</span></label>
    <select id="gender" name="gender" required>
        <option value="" disabled selected>-- Select --</option>
        <option value="male">Male</option>
        <option value="female">Female</option>
    </select>
</div>

<div class="form-group">
    <label for="dateOfBirth">Date of Birth<span style="color: red;">*</span></label>
    <input type="date" id="dateOfBirth" name="dateOfBirth" required>
</div>

<div class="form-group">
    <label for="address">Address<span style="color: red;">*</span></label>
    <input type="text" id="address" name="address" required>
</div>

<div class="form-group">
    <label for="city">City<span style="color: red;">*</span></label>
    <input type="text" id="city" name="city" required>
</div>

<div class="form-group">
    <label for="mobilePhone">Phone Number<span style="color: red;">*</span></label>
    <input type="number" id="mobilePhone" name="mobilePhone" required>
</div>


<div class="form-group">
    <label for="idType">ID Type <span style="color: red;">*</span></label>
    <select id="idType" name="idType" required>
        <option value="" disabled selected>-- Select --</option>
        <option value="nationalId">National ID</option>
        <option value="passport">Passport</option>
        <option value="driverLicense">Driver's License</option>
        <option value="voterId">Voter's ID</option>
    </select>
</div>

<div class="form-group">
    <label for="uniqueIdNumber">Unique ID Number<span style="color: red;">*</span></label>
    <input type="text" id="uniqueIdNumber" name="uniqueIdNumber" required>
</div>

<div class="button-group">
    <div class="back-btn">
        <button type="button" id="closeGroupReg" onclick="hideGuarantorForm()">Cancel</button>
    </div>
    <div class="submit-btn">
        <button type="button" onclick="submitGuarantor()">Submit</button>
    </div>
</div>

</form>


                                        </div>

                                        <div class="back-btn">
                                <button type="button" class="back-button" onclick="prevStep(6)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    
                                    <button type="button" class="next-button" onclick="nextStep(6)">Next</button>
                                    
                                </div>

                            </div>
                            <!-- Step 6 -->
                            <div class="form-step" id="step-6">
                               
                           

                            <fieldset>
                            <button type="button" id="generateSchedule">Generate Repayment Schedule</button>
                               

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
                                
                                <div class="back-btn">
                                <button type="button" class="back-button" onclick="prevStep(6)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    
                                    <button type="button" class="next-button" onclick="nextStep(6)">Next</button>
                                    
                                </div>
                            </div>

                             <!--add beneficiary  Popup Form -->
                             <div class="popup" id="addBeneficiarydetails" style="display: none;">
                                <h4 >Add Beneficiary Details</h4>
                                <hr>
                                <form id="addBeneficiarydetails">
                                <div class="form-group">
                                           <label for="beneficiaryName">Beneficiary Name<span style="color: red;">*</span></label>
                                            <input type="text" id="beneficiaryName" name="beneficiaryName">
                                        </div>

                                        <div class="form-group">
                                           <label for="beneficiaryNumber">Beneficiary Phone Nnumber<span style="color: red;">*</span></label>
                                            <input type="number" id="beneficiaryNumber" name="beneficiaryNumber">
                                        </div>
                                    <div class="form-group">
                                    <label for="relationshiptype">Relationship Type <span style="color: red;">*</span></label>
                                      <select id="relationshiptype" name="relationshiptype" required>
                                          <option value="" disabled selected>-- Select --</option>
                                          <option value="sister">Sister</option>
                                          <option value="brother">Brother</option>
                                          <option value="sibling">Sibling</option>
                                          <option value="mother">Mother</option>
                                          <option value="father">Father</option>
                                          <option value="wife">Wife</option>
                                          <option value="husband">Husband</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                            <label for="amountOflegacy">Amount Of legacy <span style="color: red;">*</span></label>
                                            <input type="number" id="amountOflegacy" name="amountOflegacy" required >
                                        </div>
                                        <div class="form-group">
                                            <label for="beneficiaryAddress">Beneficiary Address <span style="color: red;">*</span></label>
                                            <input type="text" id="beneficiaryAddress" name="beneficiaryAddress" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="beneficiarytown">Beneficiary Town <span style="color: red;">*</span></label>
                                            <input type="text" id="beneficiarytown" name="beneficiarytown"required >
                                        </div>
                                        <div class="form-group">
                                            <label for="beneficiaryregion">Beneficiary Region </label>
                                            <input type="text" id="beneficiaryregion" name="beneficiaryregion" >
                                        </div>
                                        <div class="form-group">
                                            <label for="beneficiaryCountry">Beneficiary Country </label>
                                            <input type="text" id="beneficiaryCountry" name="beneficiaryCountry" >
                                        </div>
                                        
                                        
                                    <div class="button-group">
                                    <div class="back-btn">
                                    <button type="button" id="closeGroupReg" onclick="hideBeneficiaryForm()">Cancel</button>
                                    </div>
                                    <div class="submit-btn">
                                    <button type="button" id="confirmButtonGroupReg" onclick="SubmitBeneficiarydetails()">Submit</button>
                                    </div> 
                                        
                                    </div>
                                </form>
                                <hr>
                            </div>


                            <!-- Step 7 -->
                            <div class="form-step" id="step-7">
                            <form id="loanApplicationForm" action="\summit\backend\submit_loan_application.php" method="POST" enctype="multipart/form-data">
                                <div class="fieldset-container">
                            
                                     <!-- Preview for Marital Status -->
                                     
                                            <!-- Preview Section -->
                                            <fieldset class="inner-fieldset">
                                                <legend><strong>Loan Details</strong></legend>
                                                <p>Loan Category: <strong><span id="review-loanType" class="preview-bold"></span></strong></p>
                                                <p>Loan Amount (GHS): <strong><span id="review-loanAmount" class="preview-bold"></span></strong></p>
                                                <p>Loan Term (weeks): <strong><span id="review-loanTerm" class="preview-bold"></span></strong></p>
                                                <p>Repayment Frequency: <strong><span id="review-repaymentFrequency" class="preview-bold"></span></strong></p>
                                                <p>Interest Rate (%): <strong><span id="review-interestRate" class="preview-bold"></span></strong></p>
                                                <p>First Repayment Date: <strong><span id="review-firstRepayment" class="preview-bold"></span></strong></p>
                                                <p>External ID: <strong><span id="review-externalID" class="preview-bold"></span></strong></p>
                                            </fieldset>

                                            <fieldset class="inner-fieldset">
                                                <legend><strong>Settings </strong></legend>
                                                <p>Branch Name: <strong><span id="preview-branchName" class="preview-bold"></span></strong></p>
                                                <p>Loan Officer: <strong><span id="preview-loanOfficer" class="preview-bold"></span></strong></p>
                                                <p>Loan Purpose: <strong><span id="preview-loanPurpose" class="preview-bold"></span></strong></p>
                                                <p>Principal Grace Period: <strong><span id="preview-gracePeriodPrincipal" class="preview-bold"></span></strong></p>
                                                <p>Interest Grace Period: <strong><span id="preview-gracePeriodInterest" class="preview-bold"></span></strong></p>
                                                <p>Submission Date: <strong><span id="preview-submissionDate" class="preview-bold"></span></strong></p>
                                                <p>Disbursement Date: <strong><span id="preview-disbursementDate" class="preview-bold"></span></strong></p>
                                            </fieldset>

                                            
                                   
                                </div>
                         
                                
                                    <div class="fieldset-container">
                                    

                                        <!-- Collateral Preview -->
                                        <fieldset class="inner-fieldset">
                                            <legend> <strong>Collateral </strong> </legend>
                                            <p>Collateral Type: <strong><span id="preview-collateralType" class="preview-bold"></span></strong></p>
                                            <p>Collateral Value: <strong><span id="preview-collateralValue" class="preview-bold"></span></strong></p>
                                            <p>Collateral Document: <strong><span id="preview-collateralDocument" class="preview-bold">No file selected</span></strong></p>
                                            <p>Description: <strong><span id="preview-description" class="preview-bold"></span></strong></p>
                                        </fieldset>

                                        
                                   

                                           <fieldset class="inner-fieldset">
                                                <legend><strong>Charges/Penalty</strong></legend>
                                                <p>Processing Fee: <strong><span id="preview-processingFee" class="preview-bold"></span></strong></p>
                                                <p>Maintenance Fee: <strong><span id="preview-maintenanceFee" class="preview-bold"></span></strong></p>
                                                <p>Other Fee: <strong><span id="preview-otherFee" class="preview-bold"></span></strong></p>
                                                <p>Loan Default Penalty: <strong><span id="preview-loanDefault" class="preview-bold"></span></strong></p>
                                                <p>Late Payment Penalty: <strong><span id="preview-latePayment" class="preview-bold"></span></strong></p>
                                            </fieldset>
                                    </div>
                                

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
                                        <tbody id="previewTableBodyGuarantor">
                                            <!-- Preview data will be added dynamically -->
                                        </tbody>
                                    </table>
                                </fieldset>
                                <fieldset >
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
                                        <tbody id="repaymentTableBodyPreview">
                                            <!-- Rows will be dynamically inserted here by JavaScript -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">TOTAL</td>
                                                <td id="totalPrincipalDuePreview">0.00</td>
                                                <td></td>
                                                <td id="totalInterestPreview">0.00</td>
                                                <td id="totalDuePreview">0.00</td>
                                            </tr>
                                        </tfoot>

                                    </table>
                                </fieldset>

                            
                                <div class="back-btn">
                                   <button type="button" class="back-button" onclick="prevStep(7)">Back</button>
                                </div>
                                <div class="submit-btn">
                                   
                                   <button type="submit" class="next-button" onclick="submitLoanApplicationForm()" >Submit</button>
                                </div>
                            </div>
                        </form>
                <hr>
            </div>

<!-- JavaScript -->



        

<script>

        
     // Function to show the popup form
   
   

     // Function to show the popup form
     document.getElementById('AddGuarantor').addEventListener('click', () => {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('guarantorRegForm').style.display = 'block';
    });
    // Function to hide the popup form
    function hideGroupRegForm() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('groupRegForm').style.display = 'none';
    }


    function submitLoanApplicationForm() {
            // Simulate form submission logic
            alert("Loan Application form submitted!");
            location.reload(); // Reload the page
        }

    function hideGuarantorForm() {
        document.getElementById("guarantorRegForm").style.display = "none";
        document.getElementById("overlay").style.display = "none";
    }
   

    document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('generateSchedule').addEventListener('click', function () {
        // Input values
        const loanAmount = parseFloat(document.getElementById('loanAmount').value);
        const loanTerm = parseInt(document.getElementById('loanTerm').value); // Total number of weeks or months
        const repaymentFrequency = document.getElementById('repaymentFrequency').value; // "week" or "month"
        const interestRate = parseFloat(document.getElementById('interestRate').value);
        const firstRepaymentDate = new Date(document.getElementById('firstRepayment').value);

        // Derived values
        const principalDuePerRepayment = loanAmount / loanTerm;
        const interestPerRepayment = (loanAmount * (interestRate / 100)) / loanTerm;
        const totalInstallments = loanTerm;
        let principalBalance = loanAmount;

        // Table body elements
        const repaymentTableBody = document.getElementById("repaymentTableBody");
        const repaymentTableBodyPreview = document.getElementById("repaymentTableBodyPreview");

        let totalPrincipalDue = 0;
        let totalInterest = 0;
        let totalDue = 0;

        // Clear existing rows
        repaymentTableBody.innerHTML = "";
        repaymentTableBodyPreview.innerHTML = "";

        for (let i = 1; i <= totalInstallments; i++) {
            // Clone first repayment date
            const dueDate = new Date(firstRepaymentDate);

            // Set the correct repayment date
            if (repaymentFrequency === "week") {
                dueDate.setDate(dueDate.getDate() + (i - 1) * 7);
            } else if (repaymentFrequency === "month") {
                dueDate.setMonth(dueDate.getMonth() + (i - 1));
            }

            const totalDuePerInstallment = principalDuePerRepayment + interestPerRepayment;
            principalBalance -= principalDuePerRepayment;

            // Update totals
            totalPrincipalDue += principalDuePerRepayment;
            totalInterest += interestPerRepayment;
            totalDue += totalDuePerInstallment;

            // Create row for the main table
            const row = `
                <tr>
                    <td>${i}</td>
                    <td>${dueDate.toLocaleDateString("en-GB")}</td>
                    <td>${principalDuePerRepayment.toFixed(2)}</td>
                    <td>${principalBalance.toFixed(2)}</td>
                    <td>${interestPerRepayment.toFixed(2)}</td>
                    <td>${totalDuePerInstallment.toFixed(2)}</td>
                </tr>
            `;
            repaymentTableBody.insertAdjacentHTML("beforeend", row);

            // Create row for the preview table
            const previewRow = `
                <tr>
                    <td>${i}</td>
                    <td>${dueDate.toLocaleDateString("en-GB")}</td>
                    <td>${principalDuePerRepayment.toFixed(2)}</td>
                    <td>${principalBalance.toFixed(2)}</td>
                    <td>${interestPerRepayment.toFixed(2)}</td>
                    <td>${totalDuePerInstallment.toFixed(2)}</td>
                </tr>
            `;
            repaymentTableBodyPreview.insertAdjacentHTML("beforeend", previewRow);
        }

        // Update footer totals for the main table
        document.getElementById("totalPrincipalDue").textContent = totalPrincipalDue.toFixed(2);
        document.getElementById("totalInterest").textContent = totalInterest.toFixed(2);
        document.getElementById("totalDue").textContent = totalDue.toFixed(2);

        // Update footer totals for the preview table
        document.getElementById("totalPrincipalDuePreview").textContent = totalPrincipalDue.toFixed(2);
        document.getElementById("totalInterestPreview").textContent = totalInterest.toFixed(2);
        document.getElementById("totalDuePreview").textContent = totalDue.toFixed(2);
    });
});



    let currentStep = 1;

function nextStep() {
    if (currentStep < 7) {
        // Remove the active class from the current step
        document.getElementById("step-" + currentStep).classList.remove("active");
        // Increment current step and add active class to the new step
        currentStep++;
        document.getElementById("step-" + currentStep).classList.add("active");
        updateProgressBar(currentStep);
    }
}

function prevStep() {
    if (currentStep > 1) {
        // Remove the active class from the current step
        document.getElementById("step-" + currentStep).classList.remove("active");
        // Decrement current step and add active class to the new step
        currentStep--;
        document.getElementById("step-" + currentStep).classList.add("active");
        updateProgressBar(currentStep);
    }
}

function updateProgressBar(step) {
    const steps = document.querySelectorAll(".step");
    steps.forEach((stepElem, index) => {
        const circle = stepElem.querySelector(".circle");
        const line = stepElem.querySelector(".line");
        if (index < step - 1) {
            circle.classList.add("completed");
            line.classList.add("active");
        } else {
            circle.classList.remove("completed");
            line.classList.remove("active");
        }
    });
}

// Add click event listeners to each circle to jump to the corresponding step
document.querySelectorAll(".circle").forEach((circle, index) => {
    circle.addEventListener("click", () => {
        // Only update if we're moving to a different step
        if (currentStep !== index + 1) {
            // Remove active class from the current step
            document.getElementById("step-" + currentStep).classList.remove("active");
            // Update currentStep to the clicked step and add active class
            currentStep = index + 1;
            document.getElementById("step-" + currentStep).classList.add("active");
            updateProgressBar(currentStep);
        }
    });
});


            //dynamic radio changing.
             document.addEventListener("DOMContentLoaded", function() {
            // Get the radio buttons and form elements
            const addToGroupYes = document.getElementById("addToGroupYes");
            const addToGroupNo = document.getElementById("addToGroupNo");
            const groupDetails = document.getElementById("groupDetails");
            const roleDetails = document.getElementById("roleDetails");
            const groupNameField = document.getElementById("groupName");
            const clientRoleField = document.getElementById("clientRole");

          
            //dynamic cash collateral changing.
            const collateralType = document.getElementById('collateralType');
            const collateralDocumentGroup = document.getElementById('collateralDocumentGroup');

            // Add event listener for change on collateral type
            collateralType.addEventListener('change', function () {
                if (this.value === 'cash') {
                    // Hide the collateral document field and label
                    collateralDocumentGroup.style.display = 'none';
                } else {
                    // Show the collateral document field and label
                    collateralDocumentGroup.style.display = 'block';
                }
            });


            // Function to toggle visibility of the fields
            function toggleFields() {
                if (addToGroupYes.checked) {
                    // Show the fields by setting display to block
                    groupDetails.style.display = "block";
                    roleDetails.style.display = "block";
                    groupNameField.disabled = false;
                    clientRoleField.disabled = false;
                } else {
                    // Hide the fields by setting display to none
                    groupDetails.style.display = "none";
                    roleDetails.style.display = "none";
                    groupNameField.disabled = true;
                    clientRoleField.disabled = true;
                }
            }

            // Hide fields by default on page load
            toggleFields();

            // Add event listeners to the radio buttons
            addToGroupYes.addEventListener("change", toggleFields);
            addToGroupNo.addEventListener("change", toggleFields);
        });




    
    
   // Show the guarantor form popup
document.getElementById("AddGuarantor").addEventListener("click", () => {
    document.getElementById("guarantorRegForm").style.display = "block";
    document.getElementById("overlay").style.display = "block";
});

// Hide the guarantor form popup
function hideGuarantorForm() {
    document.getElementById("guarantorRegForm").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

// Handle form submission


// Handle form submission
function submitGuarantor() {
    // Get values from the input fields
    const relationship = document.getElementById("relationship").value;
    const firstName = document.getElementById("firstName").value.trim();
    const lastName = document.getElementById("lastName").value.trim();
    const gender = document.getElementById("gender").value;
    const dateOfBirth = document.getElementById("dateOfBirth").value;
    const address = document.getElementById("address").value.trim();
    const city = document.getElementById("city").value.trim();
    const mobilePhone = document.getElementById("mobilePhone").value.trim();
    const idType = document.getElementById("idType").value;
    const uniqueId = document.getElementById("uniqueIdNumber").value.trim();

    // Validate input
    if (!relationship || !firstName || !lastName || !gender || !dateOfBirth || !address || !city || !mobilePhone || !idType || !uniqueId) {
        alert("Please fill out all fields.");
        return;
    }

    // Add the data to the main table
    const membersRow = document.createElement("tr");

    // Create delete icon
    const deleteIcon = document.createElement("span");
    deleteIcon.innerHTML = "&#128465;";  // Unicode for trash can icon
    deleteIcon.style.cursor = "pointer";
    deleteIcon.classList.add("delete-icon");
    deleteIcon.title = "Remove Guarantor";

    // Set up delete icon click event to remove the row
    deleteIcon.addEventListener("click", function() {
        membersRow.remove();  // Remove from main table
        previewRow.remove();  // Remove from preview table
    });

    // Fill the table row with form data
    membersRow.innerHTML = `
        <td>${relationship}</td>
        <td>${firstName}</td>
        <td>${lastName}</td>
        <td>${gender}</td>
        <td>${dateOfBirth}</td>
        <td>${address}</td>
        <td>${city}</td>
        <td>${mobilePhone}</td>
        <td>${idType}</td>
        <td>${uniqueId}</td>
        <td></td>
    `;

    // Append the delete icon to the last cell of the row
    membersRow.cells[10].appendChild(deleteIcon);

    // Add the row to the main table
    document.getElementById("guarantorTableBody").appendChild(membersRow);

    // Add a preview row to the preview table
    const previewRow = document.createElement("tr");
    previewRow.innerHTML = `
        <td>${relationship}</td>
        <td>${firstName}</td>
        <td>${lastName}</td>
        <td>${gender}</td>
        <td>${dateOfBirth}</td>
        <td>${address}</td>
        <td>${city}</td>
        <td>${mobilePhone}</td>
        <td>${idType}</td>
        <td>${uniqueId}</td>
        <td></td>
    `;

    // Add the preview row to the preview table
    document.getElementById("previewTableBodyGuarantor").appendChild(previewRow);

    // Add delete icon for the preview row
    const previewDeleteIcon = document.createElement("span");
    previewDeleteIcon.innerHTML = "&#128465;";  // Unicode for trash can icon
    previewDeleteIcon.style.cursor = "pointer";
    previewDeleteIcon.classList.add("delete-icon");
    previewDeleteIcon.title = "Remove Guarantor";

    // Set up delete icon click event for the preview row
    previewDeleteIcon.addEventListener("click", function() {
        previewRow.remove();  // Remove from preview table
        membersRow.remove();  // Remove from main table
    });

    // Append the delete icon to the last cell of the preview row
    previewRow.cells[10].appendChild(previewDeleteIcon);

    // Clear the input fields
    document.getElementById("relationship").value = "";
    document.getElementById("firstName").value = "";
    document.getElementById("lastName").value = "";
    document.getElementById("gender").value = "";
    document.getElementById("dateOfBirth").value = "";
    document.getElementById("address").value = "";
    document.getElementById("city").value = "";
    document.getElementById("mobilePhone").value = "";
    document.getElementById("idType").value = "";
    document.getElementById("uniqueIdNumber").value = "";

    // Show an alert message
    alert("Guarantor added successfully!");

      // Close the form
      document.getElementById('overlay').style.display = 'none';
    document.getElementById('guarantorRegForm').style.display = 'none';


}


// end of member identification popup and delete-all


function hideBeneficiaryForm() {
    // Hide the form or manipulate the display style
    document.getElementById('addBeneficiarydetails').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}

//End of beneficiary popup form and delete-all

const formFields = [
    // Loan Form Fields
    { inputId: "loanType", previewId: "review-loanType" },
    { inputId: "loanAmount", previewId: "review-loanAmount" },
    { inputId: "loanTerm", previewId: "review-loanTerm" },
    { inputId: "repaymentFrequency", previewId: "review-repaymentFrequency" },
    { inputId: "interestRate", previewId: "review-interestRate" },
    { inputId: "firstRepayment", previewId: "review-firstRepayment" },
    { inputId: "externalID", previewId: "review-externalID" },

    // Settings Form Fields
    { inputId: "branchName", previewId: "preview-branchName" },
    { inputId: "loanOfficer", previewId: "preview-loanOfficer" },
    { inputId: "loanPurpose", previewId: "preview-loanPurpose" },
    { inputId: "gracePeriodPrincipal", previewId: "preview-gracePeriodPrincipal" },
    { inputId: "gracePeriodInterest", previewId: "preview-gracePeriodInterest" },
    { inputId: "submissionDate", previewId: "preview-submissionDate" },
    { inputId: "disbursementDate", previewId: "preview-disbursementDate" },

    // Charges Form Fields
    { inputId: "processingFee", previewId: "preview-processingFee" },
    { inputId: "maintenanceFee", previewId: "preview-maintenanceFee" },
    { inputId: "otherFee", previewId: "preview-otherFee" },
    { inputId: "loanDefault", previewId: "preview-loanDefault" },
    { inputId: "latePayment", previewId: "preview-latePayment" },

    // Collateral Form Fields
    { inputId: "collateralType", previewId: "preview-collateralType" },
    { inputId: "collateralValue", previewId: "preview-collateralValue" },
    { inputId: "collateralDocument", previewId: "preview-collateralDocument", isFile: true },
    { inputId: "description", previewId: "preview-description" },
];

// Update preview fields as users input data
formFields.forEach(({ inputId, previewId }) => {
    const input = document.getElementById(inputId);
    const preview = document.getElementById(previewId);

    if (!input || !preview) return; // Ensure elements exist to prevent errors

    // For text and number inputs
    input.addEventListener("input", () => {
        preview.textContent = input.value;
    });

    // For select elements
    if (input.tagName === "SELECT") {
        input.addEventListener("change", () => {
            preview.textContent = input.options[input.selectedIndex].text;
        });
    }

    // For date inputs
    if (input.type === "date") {
        input.addEventListener("change", () => {
            preview.textContent = input.value;
        });
    }
});

function submitLoanApplicationForm(event) {
    // Prevent form submission to handle it manually
    event.preventDefault();

    try {
        // Loop through formFields and copy preview data into hidden input fields
        formFields.forEach(({ inputId, previewId }) => {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            
            if (input && preview) {
                // Check if there is a corresponding hidden field to store the value
                const hiddenField = document.querySelector(`input[name='${inputId}']`);
                if (hiddenField) {
                    // For file inputs, handle them differently
                    if (input.type === "file") {
                        hiddenField.value = input.files[0] ? input.files[0].name : '';
                    } else {
                        // For text, number, select, and other non-file inputs
                        hiddenField.value = preview.textContent || input.value;
                    }
                } else {
                    throw new Error(`Hidden field for ${inputId} not found.`);
                }
            } else {
                throw new Error(`Input or preview element for ${inputId} not found.`);
            }
        });

        // Submit the form after collecting the data
        const form = document.getElementById('loanApplicationForm'); // Ensure your form has an id of 'loanForm'
        if (!form) {
            throw new Error('Form not found.');
        }

        // If you are using AJAX, replace this with AJAX submission code
        form.submit();

        // If submission is successful, show a success alert
        alert("Loan Application form submitted!");
    } catch (error) {
        // If any error occurs during the process, show an error message
        console.error(error); // Log the error for debugging
        alert(`An error occurred while submitting the form: ${error.message}`);
    }
}




    </script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>