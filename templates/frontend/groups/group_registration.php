<?php 
$pageTitle = 'Group Registration';
include '../navbar.php';
include '../header_bar.php';


// Include the database connection file
include '../../../db_connection.php';

// Fetch all branches from the database
$query = "SELECT branch_name FROM branch"; // Assuming the table is named 'branch'
$result = $conn->query($query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><h1><?php echo $pageTitle; ?></h1></title>
    <link rel="stylesheet" href="/SUMMIT/stylesheet/groups/group_management.css">
</head>
<body>
    <div class="cm_container">
        <div class="cm_main">
           
            <section class="cm_client-list">

                    <div class="form-container">
                <!-- Step Progress Bar -->
                <div class="progress-bar">
                    <div class="step">
                        <div class="circle">1</div>
                        <p>Group Details</p>
                    </div>
                    <div class="line"></div>
                    <div class="step">
                        <div class="circle">2</div>
                        <p>Membership</p>
                    </div>
                    <div class="line"></div>
                    <div class="step">
                        <div class="circle">3</div>
                        <p>Preview</p>
                    </div>
                </div>

                <!-- Step 1: Group Details -->
                <div class="form-step active">
                    <div class="form-section">
                        <form>
                            <fieldset>
                                <legend>Group Details</legend>
                                <div class="center-form">
                                <div class="form-group">
                                    <label for="groupName">Group Name <span style="color: red;">*</span></label>
                                    <input type="text" id="groupName" name="groupName" required>
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
                                    <label for="loanOfficer">Loan Officer</label>
                                    <select id="loanOfficer" name="loanOfficer" required>
                                        <option value="" disabled selected>-- Select --</option>
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


                                        <!-- Add branch options here -->
                        
                                </div>
                                <div class="form-group">
                                    <label for="externalID">External ID</label>
                                    <input type="text" id="externalID" name="externalID">
                                </div>
                                <div class="form-group">
                                    <label for="submissionDate" >Submission Date <span style="color: red;">*</span></label>
                                    <input type="date" id="submissionDate" name="submissionDate" required value="2024-11-07">
                                </div>
                                </div>
                            </fieldset>
                            <div class="submit-btn">
                                <button type="button" class="next-button">Next</button>
                            </div>
                        </form>
                    </div>
                </div>
                

                <!-- Step 2: Membership -->
                <div class="form-step">
                    <form>
                    <fieldset>
                        <legend>membership</legend>
                    
                    <button type="button" class="add-member" id="addMember">+ Add Member</button>
                    <button type="button" class="delete-all">Delete All</button>
                    <table>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Account #</th>
                                <th>Mobile #</th>
                                <th>Client Status</th>
                            </tr>
                        </thead>
                        <tbody id="membersTableBody">
                            <!-- Members will be added dynamically -->
                        </tbody>
                    </table>
                    </fieldset>
                    <div class="back-btn">
                    <button type="button" class="back-button">Back</button>
                    </div>
                    <div class="submit-btn">
                    <button type="button" class="preview-button">Preview</button>
                    </div>
                    </form>
                </div>

<!-- Step 3: Preview -->
                <div class="form-step">
                    <form action="">
                    <fieldset>
                        <legend>Preview</legend>
                        <div class="center-form">
                        <div class="preview-details">
                            <h4>Group Details</h4>
                            <p><Strong>Group Name: </Strong><span id="previewGroupName"></span></p>
                            <p><strong>Branch Name: </strong> <span id="previewBranchName"></p>
                            <p><strong>Loan Officer: </strong> <span id="previewLoanOfficer"></p>
                            <p><strong>External ID:</strong> <span id="previewExternalID"></p>
                            <p><strong>Submission Date:</strong> <span id="previewSubmissionDate"></p>
                        </div>
                        </div>
                        <div class="preview-members">
                            <h4>Membership</h4>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Account #</th>
                                        <th>Mobile #</th>
                                        <th>Client Status</th>
                                    </tr>
                                </thead>
                                <tbody id="previewMembersTableBody">
                                    <!-- Preview of members will be shown here -->
                                </tbody>
                            </table>
                        </div>
                    
                    </fieldset>
                    </form>
                    <div class="back-btn">
                        <button type="button" class="back-button">Back</button>
                    </div>
                    <div class="submit-btn">
                    <button type="button" id="confirmButtonGroupReg" onclick="submitGroupRegForm()">Submit</button>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>

    <!-- Add Member Button -->
            

            <!-- Overlay -->
           <!-- Overlay for the popup -->
            <div id="overlay" class="overlay" style="display: none;"></div>

            <!-- Popup Form -->
            <div class="popup" id="groupRegForm" style="display: none;">
                <h4>Add Group Member</h4>
                <hr>
                <form id="groupRegFormDetails">
                    <div class="form-group">
                    <label for="searchClient">
                        Search Client Name:
                    </label>
                    <input type="text" id="searchClient"name="searchClient"placeholder="Name, Account #, or Phone" />
                    </div>
                    <div class="button-group">
                    <div class="back-btn">
                    <button type="button" id="closeGroupReg" onclick="hideGroupRegForm()">Cancel</button>
                    </div>
                    <div class="submit-btn">
                    <button type="button" id="confirmButtonGroupReg" onclick="submitAddMember()">Submit</button>
                    </div> 
                        
                    </div>
                </form>
                <hr>
            </div>

<!-- JavaScript -->
<script>
    // Function to show the popup form
    document.getElementById('addMember').addEventListener('click', () => {
        document.getElementById('overlay').style.display = 'block';
        document.getElementById('groupRegForm').style.display = 'block';
    });

    // Function to hide the popup form
    function hideGroupRegForm() {
        document.getElementById('overlay').style.display = 'none';
        document.getElementById('groupRegForm').style.display = 'none';
    }

    // Function to handle form submission
    function submitAddMember() {
        // Add your form submission logic here
        alert('Form submitted successfully!');
        hideGroupRegForm();
    }

    document.addEventListener('DOMContentLoaded', () => {
    const nextButtons = document.querySelectorAll('.next-button');
    const backButtons = document.querySelectorAll('.back-button');
    const steps = document.querySelectorAll('.form-step');
    const circles = document.querySelectorAll('.circle');
    const lines = document.querySelectorAll('.line');
    const previewButton = document.querySelector('.preview-button'); // Select the preview button

    let currentStep = 0;

    function updateStep(newStep) {
        // Update form step visibility
        steps[currentStep].classList.remove('active');
        currentStep = newStep;
        steps[currentStep].classList.add('active');

        // If moving to the preview step, populate preview details
        if (currentStep === steps.length - 1) {
            populatePreview(); // Ensure the Preview is populated
        }

        // Update the progress bar
        updateProgress();
    }

    // Function to update the progress bar
    function updateProgress() {
        // Update progress circles
        circles.forEach((circle, index) => {
            circle.classList.toggle('completed', index <= currentStep);
        });

        // Update progress lines
        lines.forEach((line, index) => {
            line.classList.toggle('active', index < currentStep);
        });
    }

    // Function to populate the Preview step with entered details
    function populatePreview() {
        // Group Details
        document.getElementById('previewGroupName').textContent = document.getElementById('groupName').value;
        document.getElementById('previewBranchName').textContent = document.getElementById('branchName').value;
        document.getElementById('previewLoanOfficer').textContent = document.getElementById('loanOfficer').value;
        document.getElementById('previewExternalID').textContent = document.getElementById('externalID').value;
        document.getElementById('previewSubmissionDate').textContent = document.getElementById('submissionDate').value;

        // Add description for the Preview step
        document.getElementById('previewDescription').textContent = `This is a preview of the group and membership details you entered. Please review all information carefully before submitting.`;

        // Membership Details
        const membersTableBody = document.getElementById('membersTableBody');
        const previewMembersTableBody = document.getElementById('previewMembersTableBody');

        // Clear previous preview members
        previewMembersTableBody.innerHTML = '';

        // Clone and append members to the preview table
        Array.from(membersTableBody.children).forEach(row => {
            const clone = row.cloneNode(true);
            previewMembersTableBody.appendChild(clone);
        });
    }

    // Function to validate the current form step
    function isFormValid() {
        const form = steps[currentStep].querySelector('form');
        if (form) {
            return form.checkValidity(); // Returns true if the form is valid
        }
        return true; // If there's no form, consider it valid
    }

    // Next button functionality with validation
    nextButtons.forEach((button) => {
        button.addEventListener('click', () => {
            if (isFormValid()) { // Check if the form is valid
                if (currentStep < steps.length - 1) {
                    updateStep(currentStep + 1); // Move to next step
                }
            } else {
                // Show validation errors if form is not valid
                const form = steps[currentStep].querySelector('form');
                if (form) {
                    form.reportValidity(); // Show built-in validation messages
                }
            }
        });
    });

    // Back button functionality
    backButtons.forEach((button) => {
        button.addEventListener('click', () => {
            if (currentStep > 0) {
                updateStep(currentStep - 1); // Move to previous step
            }
        });
    });

    // Preview button functionality (same as Next button behavior)
    if (previewButton) {
        previewButton.addEventListener('click', () => {
            if (currentStep < steps.length - 1) {
                // Move to the next step (Preview)
                updateStep(currentStep + 1);
            }
        });
    }

    // Initialize progress on page load
    updateProgress();
});


function submitGroupRegForm() {
    // Simulate form submission logic
    alert("Group Registration Form has been submitted!");
    location.reload(); // Reload the page
}


</script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>