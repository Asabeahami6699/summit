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
                                        <div class="form-group">
                                            <label>Business Owner / Employee?</label>
                                                <div  class ="radio-group">
                                                    <input type="radio" id="businessOwner" name="employmentStatus" value="Business Owner">
                                                    <label for="businessOwner">Business Owner</label>
                                                    <input type="radio" id="employee" name="employmentStatus" value="Employee">
                                                    <label for="employee">Employee</label>
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
                                        </div>
                                        <div class="form-group">
                                        <label>Add Client to Existing Group?</label>
                                                <div class="radio-group">
                                                    <input type="radio" id="addToGroupYes" name="addToGroup" value="Yes">
                                                    <label for="addToGroupYes">Yes</label>
                                                    <input type="radio" id="addToGroupNo" name="addToGroup" value="No" checked>
                                                    <label for="addToGroupNo">No</label>
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
                                    </div>
                                </fieldset>
                                               
                        
                                </div>
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(1)">Next</button>
                                </div>
                            </div>

                            <!-- Step 2 -->
                            <div class="form-step" id="step-2">
                                <h2>Step 2: Address Information</h2>
                                <div class="center-form">
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" id="address" name="address" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone:</label>
                                        <input type="tel" id="phone" name="phone" required>
                                    </div>
                                </div>
                                <div class="back-btn">
                                <button type="button" class="back-button" onclick="prevStep(2)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(2)">Next</button>
                                </div>
                            </div>

                            <!-- Step 3 -->
                            <div class="form-step" id="step-3">
                                <h2>Step 3: Account Information</h2>
                                <div class="center-form">
                                    <div class="form-group">
                                        <label for="account-number">Account Number:</label>
                                        <input type="text" id="account-number" name="account-number" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="bank-name">Bank Name:</label>
                                        <input type="text" id="bank-name" name="bank-name" required>
                                    </div>
                                </div>
                                <div class="back-btn">
                                <button type="button" class="back-button" onclick="prevStep(3)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(3)">Next</button>
                                </div>
                            </div>

                            <!-- Step 4 -->
                            <div class="form-step" id="step-4">
                                <h2>Step 4: Payment Information</h2>
                                <div class="center-form">
                                    <div class="form-group">
                                        <label for="payment-method">Payment Method:</label>
                                        <select id="payment-method" name="payment-method" required>
                                            <option value="credit-card">Credit Card</option>
                                            <option value="paypal">PayPal</option>
                                            <option value="bank-transfer">Bank Transfer</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Amount:</label>
                                        <input type="number" id="amount" name="amount" required>
                                    </div>
                                </div>
                                <div class="back-btn">
                                <button type="button" class="back-button" onclick="prevStep(4)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(4)">Next</button>
                                </div>
                            </div>

                            <!-- Step 5 -->
                            <div class="form-step" id="step-5">
                                <h2>Step 5: Review Information</h2>
                                <div class="back-btn">
                                <button type="button" class="back-button" onclick="prevStep(5)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    <button type="button" class="next-button" onclick="nextStep(5)">Next</button>
                                    
                                </div>
                            </div>

                            <!-- Step 6 -->
                            <div class="form-step" id="step-6">
                                <h2>Step 6: beneficiary Information</h2>
                                
                                <div class="back-btn">
                                <button type="button" class="back-button" onclick="prevStep(6)">Back</button>
                                </div>
                                <div class="submit-btn">
                                    
                                    <button type="button" class="next-button" onclick="nextStep(6)">Next</button>
                                    
                                </div>
                            </div>


                            <!-- Step 7 -->
                            <div class="form-step" id="step-7">
                                
                                <h2>Step 7: Review Information</h2>
                                <p><strong>Name:</strong> <span id="review-name"></span></p>
                                <p><strong>Email:</strong> <span id="review-email"></span></p>
                                <p><strong>Address:</strong> <span id="review-address"></span></p>
                                <p><strong>Phone:</strong> <span id="review-phone"></span></p>
                                <p><strong>Account Number:</strong> <span id="review-account-number"></span></p>
                                <p><strong>Bank Name:</strong> <span id="review-bank-name"></span></p>
                                <p><strong>Payment Method:</strong> <span id="review-payment-method"></span></p>
                                <p><strong>Amount:</strong> <span id="review-amount"></span></p>
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


let currentStep = 1;

            function nextStep(step) {
                if (step < 7) {
                    document.getElementById("step-" + step).classList.remove("active");
                    document.getElementById("step-" + (step + 1)).classList.add("active");
                    updateProgressBar(step + 1);
                }
            }


            function prevStep(step) {
                if (step > 1) {
                    document.getElementById("step-" + step).classList.remove("active");
                    document.getElementById("step-" + (step - 1)).classList.add("active");
                    updateProgressBar(step - 1);
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
            function submitGroupRegForm() {
            // Simulate form submission logic
            alert("Client Registration Form has been submitted!");
            location.reload(); // Reload the page
        }
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




// end of radio button dynamic
    </script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>