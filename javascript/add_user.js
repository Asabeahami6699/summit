document.addEventListener('DOMContentLoaded', function() {
    const addUserBtn = document.getElementById('addUserBtn');
    const overlay = document.getElementById('overlay');
    const popupForm = document.getElementById('addUserForm');
    const closeBtn = document.getElementById('closeBtn');

    // Show popup form and overlay when Add User button is clicked
    addUserBtn.addEventListener('click', function() {
        overlay.style.display = 'block';
        popupForm.style.display = 'block';
    });

    // Hide popup form and overlay when close button is clicked
    closeBtn.addEventListener('click', function() {
        overlay.style.display = 'none';
        popupForm.style.display = 'none';
    });

    // Prevent closing the popup when clicking inside the popup
    popupForm.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // Prevent closing the popup when clicking inside the overlay
    overlay.addEventListener('click', function(event) {
        event.stopPropagation();
    });

    // Event listener for changing the role select
    document.getElementById("role").addEventListener("change", function() {
        var branchSelect = document.getElementById("branch");
        var roleValue = this.value;

        // If "Loan Officer" is selected, hide the "All Branches" option
        if (roleValue === "loan_Officer") {
            var allBranchesOption = branchSelect.querySelector('option[value="All"]');
            if (allBranchesOption) {
                allBranchesOption.style.display = true;
            }
        } else {
            // If another role is selected, show the "All Branches" option
            var allBranchesOption = branchSelect.querySelector('option[value="All"]');
            if (allBranchesOption) {
                allBranchesOption.style.display = false;
            }
        }
    });
});
