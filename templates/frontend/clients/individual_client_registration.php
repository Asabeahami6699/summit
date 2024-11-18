<?php 
$pageTitle = 'Individual Client Registration';
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
}

.inner-fieldset {
    border: 1px solid #ccc;
    padding: 15px;
    width: 48%; /* Adjust width as needed */
    box-sizing: border-box;
}
.inner-fieldsets {
    border: 1px solid #ccc;
    padding: 15px;
    width: 60%; /* Adjust width as needed */
    box-sizing: border-box;
}
h4 {
    display: flex;
    justify-content: center; /* Center horizontally */
    align-items: center;     /* Center vertically */
    text-align: center;      /* Center text */
   
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
                <p class="font-size">Branch Details</p>
            </div>
            <div class="step">
                <div class="circle">2</div>
                <div class="line"></div>
                <p class="font-size">Client Details</p>
            </div>
            <div class="step">
                <div class="circle">3</div>
                <div class="line"></div>
                <p class="font-size">Identification</p>
            </div>
            <div class="step">
                <div class="circle">4</div>
                <div class="line"></div>
                <p class="font-size">Other Info</p>
            </div>
            <div class="step">
                <div class="circle">5</div>
                <div class="line"></div>
                <p class="font-size">Employment/Business</p>
            </div>
            <div class="step">
                <div class="circle">6</div>
                <div class="line"></div>
                <p class="font-size">Beneficiaries</p>
            </div>
            <div class="step">
                <div class="circle">7</div>
                <p class="font-size">Preview</p>
            </div>
        </div>

                <!-- Step 1: Group Details -->
                <div class="form-step active">
                    <div class="form-section">
                        <form id="multi-step-form">
                            <!-- Step 1 -->
                            <div class="form-step active" id="step-1">
                                
                               
                               
                                <fieldset>
                                    <legend>Client Details</legend>
                                    <div class="center-form">
                                      <fieldset class="inner-fieldsets">
                                        <div class="form-group">
                                            <label >Business Owner / Employee?</label>
                                                <div  class ="radio-group">
                                                    <input type="radio" id="businessOwner" name="employmentStatus" value="Business Owner">
                                                    <label for="businessOwner" class="label-radio">Business Owner</label>
                                                    <input type="radio" id="employee" name="employmentStatus" value="Employee">
                                                    <label for="employee" class="label-radio">Employee</label>
                                                </div>
                                                
                                        </div>
                                        <div class="form-group">
                                            <label for="employmentType">Employment Type <span style="color: red;">*</span></label>
                                            <select id="employmentType" name="employmentType" required>
                                                    <option value="" disabled selected>-- Select --</option>
                                                    <option value="student">Student</option>
                                                    <option value="salaryWorker">Salary Worker</option>
                                                    <option value="unemployed">Unemployed</option>
                                                    <option value="selfEmployed">Self Employed</option>
                                                    <option value="pensioneer">Pensioneer</option>
                                                    <option value="trader">Trader</option>
                                                

                                                <!-- Options to be added dynamically -->
                                            </select>
                                            <span class="error-message"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="income">Income (GHS)</label>
                                            <input type="text" id="income" name="income">
                                        </div>
                                        <div class="form-group">
                                            <label for="tenantStatus">Tenant/Property Owner? <span style="color: red;">*</span></label>
                                            <select id="tenantStatus" name="tenantStatus" required>
                                                <option value="" disabled selected>-- Select --</option>
                                                <option value="student">Property owner</option>
                                                <option value="salaryWorker">Tenant</option>
                                            </select>
                                            <span class="error-message"></span>
                                        </div>
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
                                            <span class="error-message"></span>
                                        </div>
                                        <div class="form-group">
                                        <label>Add Client to Existing Group?</label>
                                                <div class="radio-group">
                                                    <input type="radio" id="addToGroupYes" name="addToGroup" value="Yes">
                                                    <label for="addToGroupYes" class="label-radio">Yes</label>
                                                    <input type="radio" id="addToGroupNo" name="addToGroup" value="No" checked>
                                                    <label for="addToGroupNo"class="label-radio">No</label>
                                                </div>
                                                </div>
                                                <div class="form-group" id="groupDetails" style="display: none;">
                                                <label for="groupName">Group Name</label>
                                                <input type="text" id="groupName" name="groupName" disabled>
                                                </div>
                                                <div class="form-group" id="roleDetails" style="display: none;">
                                                <label for="clientRole">Client Role in Group</label>
                                                <select id="clientRole" name="clientRole" disabled>
                                                    <option value="" disabled selected>-- Select --</option>
                                                    <option value="leader">Leader</option>
                                                    <option value="member">Member</option>
                                                    <option value="secretary">Secretary</option>
                                                </select>
                                                </div>                                        

                                        <div class="form-group">
                                            <label for="loanOfficer">Loan Officer (Select branch first)</label>
                                            <select id="loanOfficer" name="loanOfficer" >
                                                <option value="" disabled selected>-- Select --</option>
                                                <!-- Options to be added dynamically -->
                                                     <?php
                                                    // Include database connection file
                                                    

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
                                        <div class="form-group">
                                            <label for="submissionDate">Submission Date <span style="color: red;">*</span></label>
                                            <input type="date" id="submissionDate" name="submissionDate" required value="2024-11-08">
                                        </div>
                                        </fieldset>
                                    </div>

                                </fieldset>
                           
                        
                                
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(1)">Next</button>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="form-step" id="step-2">

                                
                                     <fieldset>
                                        <legend>Biographical Info</legend>

                                        <!-- First Fieldset for essential information -->
                                        

                                        <!-- Container to hold the two fieldsets side by side -->
                                        <div class="fieldset-container">
                                            <!-- First Fieldset for essential information -->
                                            <fieldset class="inner-fieldset">
                                                <div class="form-group">
                                                    <label for="firstName">First Name<span style="color: red;">*</span></label>
                                                    <input type="text" id="firstName" name="firstName" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastName">Last Name <span style="color: red;">*</span></label>
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
                                                    <label for="mobileNumber">Mobile phone number <span style="color: red;">*</span></label>
                                                    <input type="tel" id="mobileNumber" name="mobileNumber" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="externalId">External ID</label>
                                                    <input type="text" id="externalId" name="externalId">
                                                </div>
                                            </fieldset>

                                            <!-- Second Fieldset for additional information -->
                                            <fieldset class="inner-fieldset">
                                                <div class="form-group">
                                                    <label for="dateOfBirth">Date of Birth <span style="color: red;">*</span></label>
                                                    <input type="date" id="dateOfBirth" name="dateOfBirth" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="placeOfBirth">Place of Birth</label>
                                                    <input type="text" id="placeOfBirth" name="placeOfBirth">
                                                </div>
                                                <div class="form-group">
                                                    <label for="nationality">Nationality</label>
                                                    <select id="nationality" name="nationality">
                                                        <option value="" disabled selected>-- Select --</option>
                                                        <!-- Add options as needed -->
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="email" id="email" name="email">
                                                </div>
                                            </fieldset>
                                        </div>

                                        <fieldset>
                                           <legend>Address & Location</legend>
                                        <div class="fieldset-container">
                                            <!-- First Fieldset for essential information -->
                                            <fieldset class="inner-fieldset">
                                                

                                                <div class="form-group">
                                                    <label for="streetAddress">Street Address</label>
                                                    <input type="text" id="streetAddress" name="streetAddress">
                                                </div>
                                                <div class="form-group"> 
                                                    <label for="cityTown">City/Town</label>
                                                    <input type="text" id="cityTown" name="cityTown">
                                                </div>
                                                <div class="form-group">
                                                    <label for="stateRegion">State/Region</label>
                                                    <input type="text" id="stateRegion" name="stateRegion">
                                                </div>
                                                <div class="form-group">
                                                    <label for="country">Country</label>
                                                    <select id="country" name="country">
                                                        <option value="" disabled selected>-- Select --</option>
                                                        <!-- Options will be populated here -->
                                                    </select>
                                                </div>
                                            </fieldset>

                                            
                                            <!-- Second Fieldset for additional information -->
                                            <fieldset class="inner-fieldset">
                                                <div class="form-group">
                                                    <label for="digitalAddress">Digital Address</label>
                                                    <input type="text" id="digitalAddress" name="digitalAddress">
                                                </div>
                                                <div class="form-group">
                                                    <label for="latitude">Latitude</label>
                                                    <input type="text" id="latitude" name="latitude">
                                                </div>
                                                <div class="form-group">
                                                    <label for="longitude">Longitude</label>
                                                    <input type="text" id="longitude" name="longitude">
                                                </div>
                                                <div class="form-group">
                                                    <label for="landmark">Landmark</label>
                                                    <input type="text" id="landmark" name="landmark">
                                                </div>
                                            </fieldset>
                                        </div>
                                        
                                    </fieldset>
                                
                              <div class="back-btn">
                                <button type="button" class="back-button" onclick="prevStep(2)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(2)">Next</button>
                                </div>
                              </div>

                            <!-- Step 3 -->
                            <div class="form-step" id="step-3">
                                
                               
                                    
                                   
                                    <fieldset>
                                            <legend>Client Identification</legend>
                                        
                                        <button type="button" class="add-member" id="AddClientIdentity">+ Add identification</button>
                                        <button type="button" class="delete-all" style="background-color:red">Delete All</button>
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
                                                <!-- Rows will be dynamically inserted here by JavaScript -->
                                            </tbody>
                                        </table>
                                    </fieldset>
                                <div class="back-btn">
                                <button type="button" class="back-button" onclick="prevStep(3)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(3)">Next</button>
                                </div>
                            </div>

                            <div id="overlay" class="overlay" style="display: none;"></div>

                            <!-- Popup Form -->
                            <div class="popup" id="groupRegForm" style="display: none;">
                                <h4>Add Client Identification</h4>
                                <hr>
                                <form id="groupRegFormDetails" >
                                    <!-- form elements -->
                                    <div class="form-group">
                                        <label for="idType">ID Type <span style="color: red;">*</span></label>
                                        <select id="idType" name="gender" required>
                                            <option value="" disabled selected>-- Select --</option>
                                            <option value="ghanaCard">Ghana card</option>
                                            <option value="nationaId">National ID</option>
                                            <option value="votersId">Voters ID</option>
                                            <option value="driverLicense">Driver License</option>
                                            <option value="passport">Passport</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="idNumber">ID Number<span style="color: red;">*</span></label>
                                        <input type="text" id="idNumber" name="idNumber">
                                    </div>
                                    <div class="form-group">
                                        <label for="issueDate">Issue Date <span style="color: red;">*</span></label>
                                        <input type="date" id="issueDate" name="issueDate" required value="2024-11-08">
                                    </div>
                                    <div class="form-group">
                                        <label for="expiryDate">Expiry Date <span style="color: red;">*</span></label>
                                        <input type="date" id="expiryDate" name="expiryDate" required value="2024-11-08">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label> 
                                        <input type="text" name="description" id="description">       
                                    </div>
                                    <div class="button-group">
                                        <div class="back-btn">
                                            <button type="button" id="closeGroupReg" onclick="hideGroupRegForm()">Cancel</button>
                                        </div>
                                        <div class="submit-btn">
                                            <!-- Change from 'submit' to 'button' -->
                                            
                                            <button type="button" onclick="addClientIdentity()">Submit</button>
                                        </div> 
                                    </div>
                                </form>


                                <hr>
                            </div>

                            <!-- Step 4 -->
                            <div class="form-step" id="step-4">
                                <h2>Step 4: Other Info</h2>
                                
                                <fieldset>
                                        <legend>other Info</legend>

                                        <!-- First Fieldset for essential information -->
                                        
                                        <fieldset>
                                        <legend>Marital status</legend>
                                        <!-- Container to hold the two fieldsets side by side -->
                                        <div class="fieldset-container">
                                            <!-- First Fieldset for essential information -->
                                            <fieldset class="inner-fieldset">
                                                
                                            <div class="form-group">
                                                    <label for="gender">Marital Status <span style="color: red;">*</span></label>
                                                    <select id="gender" name="gender" required>
                                                        <option value="" disabled selected>-- Select --</option>
                                                        <option value="male">Single</option>
                                                        <option value="female">Married</option>
                                                        <option value="female">Divorce</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="spouseName">Spouse Name <span style="color: red;">*</span></label>
                                                    <input type="text" id="spouseName" name="spouseName" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dateOfBirth">Date of Birth <span style="color: red;">*</span></label>
                                                    <input type="date" id="dateOfBirth" name="dateOfBirth" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="spouseOccupatoin">Spouse Occupatoin </span></label>
                                                    <input type="text" id="spouseOccupatoin" name="spouseOccupatoin">
                                                </div>

                                                <div class="form-group">
                                                    <label for="mobileNumber">Mobile number <span style="color: red;">*</span></label>
                                                    <input type="tel" id="mobileNumber" name="mobileNumber" required>
                                                </div>
                                                
                                            </fieldset>

                                            <!-- Second Fieldset for additional information -->
                                            <fieldset class="inner-fieldset">
                                                <div class="form-group">
                                                    <label for="spouceEmployerName">Spouce Employer`s Name </span></label>
                                                    <input type="text" id="spouceEmployerName" name="spouceEmployerName" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="spouceEmployerAddress">Spouce Employer`s Address </span></label>
                                                    <input type="text" id="spouceEmployerAddress" name="spouceEmployerAddress" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="spouceEmployerNumber">Spouce Employer`s Number </span></label>
                                                    <input type="number" id="spouceEmployerNumber" name="spouceEmployerNumber" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="spouceEmployerTown">Spouce Employer`s Town </span></label>
                                                    <input type="text" id="spouceEmployerTown" name="spouceEmployerTown" >
                                                </div>
                                                
                                                
                                            </fieldset>
                                        </div>
                                    </fieldset>

                                        <fieldset>
                                           <legend>Family Details</legend>
                                        <div class="fieldset-container">
                                            <!-- First Fieldset for essential information -->
                                            <fieldset class="inner-fieldset">
                                                

                                                <div class="form-group">
                                                    <label for="familySze">Family size</label>
                                                    <input type="number" id="familySze" name="familySze">
                                                </div>
                                                <div class="form-group">
                                                    <label for="numberOfDependants">Number Of Dependants</label>
                                                    <input type="number" id="numberOfDependants" name="numberOfDependants">
                                                </div>
                                                <div class="form-group">
                                                    <label for="numberOfChildren">Number Of Children</label>
                                                    <input type="number" id="numberOfChildren" name="numberOfChildren">
                                                </div>
                                                
                                                
                                            </fieldset>

                                            
                                            <!-- Second Fieldset for additional information -->
                                            <fieldset class="inner-fieldset">
                                                <legend>Religion</legend>
                                                <div class="form-group">
                                                    <label for="religion">Religion</label>
                                                    <input type="text" id="religion" name="religion">
                                                </div>
                                                <div class="form-group">
                                                    <label for="placeOfWorship">Place of worship </label>
                                                    <input type="text" id="placeOfWorship" name="placeOfWorship">
                                                </div>
                                                <div class="form-group">
                                                    <label for="townOfWorship">Town Of worship</label>
                                                    <input type="text" id="townOfWorship" name="townOfWorship">
                                                </div>
                        
                                            </fieldset>
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
                                        <legend>Marital status</legend>
                                        <!-- Container to hold the two fieldsets side by side -->
                                        <div class="fieldset-container">
                                            <!-- First Fieldset for essential information -->
                                            <fieldset class="inner-fieldset">
                                                <div class="form-group">
                                                    <label for="businessName">Business Name <span style="color: red;">*</span></label>
                                                    <input type="text" id="businessName" name="businessName" required>
                                                </div>  
                                                <div class="form-group">
                                                    <label for="natureOfBusiness">Nature of Business  <span style="color: red;">*</span></label>
                                                    <input type="text" id="natureOfBusiness" name="natureOfBusiness" required>
                                                </div>
                                            <div class="form-group">
                                                    <label for="businessStructure">Business Structure<span style="color: red;">*</span></label>
                                                    <select id="businessStructure" name="businessStructure" required>
                                                        <option value="" disabled selected>-- Select --</option>
                                                        <option value="partnership">partnership</option>
                                                        <option value="soleProprietorship">Sole Proprietorship</option>
                                                        <option value="jointVenture">Joint Venture</option>    
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="businessStartedDate">Business started date <span style="color: red;">*</span></label>
                                                    <input type="date" id="businessStartedDate" name="businessStartedDate" value="2024-11-08">
                                                </div>
                                                <div class="form-group">
                                                    <label for="businessPhoneNumber">Business Phone Number <span style="color: red;">*</span></label>
                                                    <input type="text" id="businessPhoneNumber" name="businessPhoneNumber" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="businessIncomeLevel">Business Income Level<span style="color: red;">*</span></label>
                                                    <select id="businessIncomeLevel" name="businessIncomeLevel" required>
                                                        <option value="" disabled selected>-- Select --</option>
                                                        <option value="lowIncome">Low Income</option>
                                                        <option value="middleIncome">Middle Income</option>
                                                        <option value="highIncome">High Income</option>  
                                                    </select>
                                                </div>
                                                
                                            </fieldset>

                                            <!-- Second Fieldset for additional information -->
                                            <fieldset class="inner-fieldset">
                                                <div class="form-group">
                                                    <label for="businessAddress">Business Address </label>
                                                    <input type="text" id="businessAddress" name="businessAddress">
                                                </div>

                                                <div class="form-group">
                                                    <label for="businessTown">Business Town </label>
                                                    <input type="text" id="businessTown" name="businessTown" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="businessRegion">Business Region </label>
                                                    <input type="text" id="businessRegion" name="businessRegion" >
                                                </div>
                                                <div class="form-group">
                                                    <label for="businessLocation">Business Location </label>
                                                    <input type="text" id="businessLocation" name="businessLocation" >
                                                </div>
                                                
                                            </fieldset>
                                        </div>
                                    </fieldset>
  
                                <div class="back-btn">
                                <button type="button" class="back-button" onclick="prevStep(5)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(5)">Next</button>
                                    
                                </div>
                            </div>

                            <!-- Step 6 -->
                            <div class="form-step" id="step-6">
                               
                            <fieldset>
                                       <legend>Client Identification</legend>
                                        
                                        <button type="button" class="add-member" id="addBeneficiaryForm">+ Add Beneficiary</button>
                                        <button type="button" class="delete-all" style="background-color:red">Delete All</button>
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
                                            <tbody id="membersTable">
                                                <!-- Members will be added dynamically -->
                                            </tbody>
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
                                        </div>region
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
                            
                                <div class="fieldset-container">
                                    <fieldset class="inner-fieldset">
                                        <legend>Personal Info</legend>
                                        <p><strong>First Name:</strong> <span id="review-firstName"></span></p>
                                        <p><strong>Last Name:</strong> <span id="review-lastName"></span></p>
                                        <p><strong>Gender:</strong> <span id="review-gender"></span></p>
                                        <p><strong>Mobile Phone Number:</strong> <span id="review-mobileNumber"></span></p>
                                        <p><strong>External ID:</strong> <span id="review-externalId"></span></p>
                                        <p><strong>Date of Birth:</strong> <span id="review-dateOfBirth"></span></p>
                                        <p><strong>Place of Birth:</strong> <span id="review-placeOfBirth"></span></p>
                                        <p><strong>Nationality:</strong> <span id="review-nationality"></span></p>
                                        <p><strong>Email:</strong> <span id="review-email"></span></p>
                                    </fieldset>

                                    <fieldset class="inner-fieldset">
                                        <legend>Address & Location</legend>
                                        <p><strong>Street Address:</strong> <span id="review-streetAddress"></span></p>
                                        <p><strong>City/Town:</strong> <span id="review-cityTown"></span></p>
                                        <p><strong>State/Region:</strong> <span id="review-stateRegion"></span></p>
                                        <p><strong>Country:</strong> <span id="review-country"></span></p>
                                        <p><strong>Digital Address:</strong> <span id="review-digitalAddress"></span></p>
                                        <p><strong>Latitude:</strong> <span id="review-latitude"></span></p>
                                        <p><strong>Longitude:</strong> <span id="review-longitude"></span></p>
                                        <p><strong>Landmark:</strong> <span id="review-landmark"></span></p>
                                    </fieldset>
                                </div>
                         
                            <fieldset>
                                <legend>client identification</legend>
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
                                                <!-- Members will be added dynamically -->
                                            </tbody>
                                        </table>
                            </fieldset>

                               <!-- Form Content as you have provided -->

                             <!-- Preview Section for Marital Status and Family Details -->
                            <fieldset>
                                <legend>other</legend>
                                <div class="fieldset-container">
                                    <!-- Preview for Marital Status -->
                                    <fieldset class="inner-fieldset">
                                        <legend>Client Details</legend>
                                        <p><strong>Business Owner / Employee?:</strong> <span id="review-employmentStatus"></span></p>
                                        <p><strong>Employment Type:</strong> <span id="review-employmentType"></span></p>
                                        <p><strong>Income (GHS):</strong> <span id="review-income"></span></p>
                                        <p><strong>Tenant/Property Owner?:</strong> <span id="review-tenantStatus"></span></p>
                                        <p><strong>Branch Name:</strong> <span id="review-branchName"></span></p>
                                        <p><strong>Add Client to Existing Group?:</strong> <span id="review-addToGroup"></span></p>
                                        <p><strong>Group Name:</strong> <span id="review-groupName"></span></p>
                                        <p><strong>Client Role in Group:</strong> <span id="review-clientRole"></span></p>
                                        <p><strong>Loan Officer:</strong> <span id="review-loanOfficer"></span></p>
                                        <p><strong>Submission Date:</strong> <span id="review-submissionDate"></span></p>
                                    </fieldset>

                                    <fieldset class="inner-fieldset">
                                    <legend>Marital Status Info</legend>
                                        
                                        <p><strong>Marital Status:</strong> <span id="review-maritalStatus"></span></p>
                                        <p><strong>Spouse Name:</strong> <span id="review-spouseName"></span></p>
                                        <p><strong>Date of Birth:</strong> <span id="review-spouseDateOfBirth"></span></p>
                                        <p><strong>Spouse Occupation:</strong> <span id="review-spouseOccupation"></span></p>
                                        <p><strong>Mobile Number:</strong> <span id="review-spouseMobileNumber"></span></p>
                                        <p><strong>Spouse Employer's Name:</strong> <span id="review-spouseEmployerName"></span></p>
                                        <p><strong>Spouse Employer's Address:</strong> <span id="review-spouseEmployerAddress"></span></p>
                                        <p><strong>Spouse Employer's Number:</strong> <span id="review-spouseEmployerNumber"></span></p>
                                        <p><strong>Spouse Employer's Town:</strong> <span id="review-spouseEmployerTown"></span></p>
                                    </fieldset>

                                    <!-- Preview for Family Details -->
                                    <fieldset class="inner-fieldset">
                                       <legend>Family&Religion Info</legend>
                                        <p><strong>Family Size:</strong> <span id="review-familySize"></span></p>
                                        <p><strong>Number Of Dependents:</strong> <span id="review-numberOfDependents"></span></p>
                                        <p><strong>Number Of Children:</strong> <span id="review-numberOfChildren"></span></p>
                                        <p><strong>Religion:</strong> <span id="review-religion"></span></p>
                                        <p><strong>Place of Worship:</strong> <span id="review-placeOfWorship"></span></p>
                                        <p><strong>Town of Worship:</strong> <span id="review-townOfWorship"></span></p>
                                    </fieldset>
                                </div>
                            </fieldset>
                            <div class="fieldset-container">
                            <fieldset class="inner-fieldset">
                                <legend>Business Info</legend>
                                <p><strong>Business Name:</strong> <span id="review-businessName"></span></p>
                                <p><strong>Nature of Business:</strong> <span id="review-natureOfBusiness"></span></p>
                                <p><strong>Business Structure:</strong> <span id="review-businessStructure"></span></p>
                                <p><strong>Business Started Date:</strong> <span id="review-businessStartedDate"></span></p>
                                <p><strong>Business Phone Number:</strong> <span id="review-businessPhoneNumber"></span></p>
                                <p><strong>Business Income Level:</strong> <span id="review-businessIncomeLevel"></span></p>
                            </fieldset>

                            <fieldset class="inner-fieldset">
                                <legend>Business Address</legend>
                                <p><strong>Business Address:</strong> <span id="review-businessAddress"></span></p>
                                <p><strong>Business Town:</strong> <span id="review-businessTown"></span></p>
                                <p><strong>Business Region:</strong> <span id="review-businessRegion"></span></p>
                                <p><strong>Business Location:</strong> <span id="review-businessLocation"></span></p>
                            </fieldset>
                            </div>
                     

                                <div class="back-btn">
                                   <button type="button" class="back-button" onclick="prevStep(7)">Back</button>
                                </div>
                                <div class="submit-btn">
                                   
                                   <button type="submit" class="next-button" onclick="submitGroupRegForm()" >Submit</button>
                                </div>
                            </div>
                        </form>
                <hr>
            </div>

<!-- JavaScript -->



        

<script>

        
     // Function to show the popup form
     document.getElementById('AddClientIdentity').addEventListener('click', () => {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('groupRegForm').style.display = 'block';
    });

    // Function to hide the popup form
    function hideGroupRegForm() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('groupRegForm').style.display = 'none';
    }

        // Function to show the popup form for beneficiary
     document.getElementById('addBeneficiaryForm').addEventListener('click', () => {
     document.getElementById('overlay').style.display = 'block';
     document.getElementById('addBeneficiarydetails').style.display = 'block';
    });
     // Function to hide the popup form for beneficiary
     function hideBeneficiaryForm() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('addBeneficiarydetails').style.display = 'none';
    }



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



    //country selection

     // List of countries
     const countries  = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Argentina", "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia", "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo", "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "Ecuador", "Egypt", "El Salvador",  "Equatorial Guinea", "Eritrea", "Estonia", "Eswatini", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand", "Nicaragua", "Niger", "Nigeria", "North Korea", "North Macedonia", "Norway", "Oman", "Pakistan", "Palau", "Palestine", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Poland", "Portugal", "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan", "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Tajikistan", "Tanzania", "Thailand", "Timor-Leste", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu", "Vatican City", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"];

        // Get the country dropdown element
        const countryDropdown = document.getElementById('country');

        // Populate the dropdown
        countries.forEach(country => {
            const option = document.createElement('option');
            option.value = country;
            option.textContent = country;
            countryDropdown.appendChild(option);
        });


    //function to collect form preview 
    document.addEventListener("DOMContentLoaded", function() {
    // Function to update the preview
    function updatePreview() {

        // Branch Information
        document.getElementById("review-employmentStatus").textContent = document.querySelector('input[name="employmentStatus"]:checked') ? document.querySelector('input[name="employmentStatus"]:checked').value : '';
        document.getElementById("review-employmentType").textContent = document.getElementById("employmentType").value;
        document.getElementById("review-income").textContent = document.getElementById("income").value;
        document.getElementById("review-tenantStatus").textContent = document.getElementById("tenantStatus").value;
        document.getElementById("review-branchName").textContent = document.getElementById("branchName").value;
        document.getElementById("review-addToGroup").textContent = document.querySelector('input[name="addToGroup"]:checked') ? document.querySelector('input[name="addToGroup"]:checked').value : '';
        document.getElementById("review-groupName").textContent = document.getElementById("groupName").value;
        document.getElementById("review-clientRole").textContent = document.getElementById("clientRole").value;
        document.getElementById("review-loanOfficer").textContent = document.getElementById("loanOfficer").value;
        document.getElementById("review-submissionDate").textContent = document.getElementById("submissionDate").value;

        // Personal Information
        document.getElementById("review-firstName").textContent = document.getElementById("firstName").value;
        document.getElementById("review-lastName").textContent = document.getElementById("lastName").value;
        document.getElementById("review-gender").textContent = document.getElementById("gender").value;
        document.getElementById("review-mobileNumber").textContent = document.getElementById("mobileNumber").value;
        document.getElementById("review-externalId").textContent = document.getElementById("externalId").value;
        document.getElementById("review-dateOfBirth").textContent = document.getElementById("dateOfBirth").value;
        document.getElementById("review-placeOfBirth").textContent = document.getElementById("placeOfBirth").value;
        document.getElementById("review-nationality").textContent = document.getElementById("nationality").value;
        document.getElementById("review-email").textContent = document.getElementById("email").value;

        // Address & Location
        document.getElementById("review-streetAddress").textContent = document.getElementById("streetAddress").value;
        document.getElementById("review-cityTown").textContent = document.getElementById("cityTown").value;
        document.getElementById("review-stateRegion").textContent = document.getElementById("stateRegion").value;
        document.getElementById("review-country").textContent = document.getElementById("country").value;
        document.getElementById("review-digitalAddress").textContent = document.getElementById("digitalAddress").value;
        document.getElementById("review-latitude").textContent = document.getElementById("latitude").value;
        document.getElementById("review-longitude").textContent = document.getElementById("longitude").value;
        document.getElementById("review-landmark").textContent = document.getElementById("landmark").value;

         // Marital Status Information
         document.getElementById("review-maritalStatus").textContent = document.getElementById("gender").value;
        document.getElementById("review-spouseName").textContent = document.getElementById("spouseName").value;
        document.getElementById("review-spouseDateOfBirth").textContent = document.getElementById("dateOfBirth").value;
        document.getElementById("review-spouseOccupation").textContent = document.getElementById("spouseOccupatoin").value;
        document.getElementById("review-spouseMobileNumber").textContent = document.getElementById("mobileNumber").value;
        document.getElementById("review-spouseEmployerName").textContent = document.getElementById("spouceEmployerName").value;
        document.getElementById("review-spouseEmployerAddress").textContent = document.getElementById("spouceEmployerAddress").value;
        document.getElementById("review-spouseEmployerNumber").textContent = document.getElementById("spouceEmployerNumber").value;
        document.getElementById("review-spouseEmployerTown").textContent = document.getElementById("spouceEmployerTown").value;

        // Family Details
        document.getElementById("review-familySize").textContent = document.getElementById("familySze").value;
        document.getElementById("review-numberOfDependents").textContent = document.getElementById("numberOfDependants").value;
        document.getElementById("review-numberOfChildren").textContent = document.getElementById("numberOfChildren").value;
        document.getElementById("review-religion").textContent = document.getElementById("religion").value;
        document.getElementById("review-placeOfWorship").textContent = document.getElementById("placeOfWorship").value;
        document.getElementById("review-townOfWorship").textContent = document.getElementById("townOfWorship").value;

        // Business Details
        document.getElementById("review-businessName").textContent = document.getElementById("businessName").value;
        document.getElementById("review-natureOfBusiness").textContent = document.getElementById("natureOfBusiness").value;
        document.getElementById("review-businessStructure").textContent = document.getElementById("businessStructure").value;
        document.getElementById("review-businessStartedDate").textContent = document.getElementById("businessStartedDate").value;
        document.getElementById("review-businessPhoneNumber").textContent = document.getElementById("businessPhoneNumber").value;
        document.getElementById("review-businessIncomeLevel").textContent = document.getElementById("businessIncomeLevel").value;

        // Business Address
        document.getElementById("review-businessAddress").textContent = document.getElementById("businessAddress").value;
        document.getElementById("review-businessTown").textContent = document.getElementById("businessTown").value;
        document.getElementById("review-businessRegion").textContent = document.getElementById("businessRegion").value;
        document.getElementById("review-businessLocation").textContent = document.getElementById("businessLocation").value;
    }
    

    // Add event listeners to update the preview whenever a field changes
    const inputs = document.querySelectorAll("input, select");
    inputs.forEach(input => {
        input.addEventListener("input", updatePreview);
    });

    // Initial call to populate the preview
    updatePreview();
});

     //client identification update table code

   
// Function to hide the popup form
function hideGroupRegForm() {
    document.getElementById("groupRegForm").style.display = "none";
    document.getElementById("overlay").style.display = "none";
}

        // Function to fetch data and display it in the table
    
        function addClientIdentity() {
    // Get values from the input fields
    const idType = document.getElementById("idType").value;
    const idNumber = document.getElementById("idNumber").value;
    const issueDate = document.getElementById("issueDate").value;
    const expiryDate = document.getElementById("expiryDate").value;
    const description = document.getElementById("description").value;

    // Validate input (optional, based on your requirements)
    if (!idType || !idNumber || !issueDate || !expiryDate || !description) {
        alert("Please fill out all fields before adding a member.");
        return;
    }

    // Create a new table row
    const row = document.createElement("tr");

    // Create and append table cells with the input values
    row.innerHTML = `
        <td>${idType}</td>
        <td>${idNumber}</td>
        <td>${issueDate}</td>
        <td>${expiryDate}</td>
        <td>${description}</td>
    `;

    // Append the new row to the table body
    document.getElementById("membersTableBody").appendChild(row);

    // Clear the input fields
    document.getElementById("idType").value = "";
    document.getElementById("idNumber").value = "";
    document.getElementById("issueDate").value = "";
    document.getElementById("expiryDate").value = "";
    document.getElementById("description").value = "";

    // Show an alert message
    alert("Member added successfully!");

    // Close the form (you can hide it or manipulate it as needed)
    document.getElementById('overlay').style.display = 'none';
    document.getElementById('groupRegForm').style.display = 'none' // Replace 'yourFormId' with the ID of your form
}
// Add event listener to the "Delete All" button
document.querySelector(".delete-all").addEventListener("click", function() {
    // Get the table body element
    const tableBody = document.getElementById("membersTableBody");

    // Clear all rows from the table body
    tableBody.innerHTML = "";
});





    </script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>