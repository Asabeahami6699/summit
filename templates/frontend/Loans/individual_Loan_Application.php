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
                <p>Step 1</p>
            </div>
            <div class="step">
                <div class="circle">2</div>
                <div class="line"></div>
                <p>Step 2</p>
            </div>
            <div class="step">
                <div class="circle">3</div>
                <div class="line"></div>
                <p>Step 3</p>
            </div>
            <div class="step">
                <div class="circle">4</div>
                <div class="line"></div>
                <p>Step 4</p>
            </div>
            <div class="step">
                <div class="circle">5</div>
                <div class="line"></div>
                <p>Step 5</p>
            </div>
            <div class="step">
                <div class="circle">6</div>
                <p>Step 6</p>
            </div>
        </div>

                <!-- Step 1: Group Details -->
                <div class="form-step active">
                    <div class="form-section">
                    <form id="multi-step-form">
                            <!-- Step 1 -->
                            <div class="form-step active" id="step-1">
                                <h2>Step 1: Personal Information</h2>
                                <div class="center-form">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="email" id="email" name="email" required>
                                    </div>
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
                                <div class="submit-btn">
                                    <button type="button" class="back-button" onclick="prevStep(2)">Back</button>
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
                                <div class="submit-btn">
                                    <button type="button" class="back-button" onclick="prevStep(3)">Back</button>
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
                                <div class="submit-btn">
                                    <button type="button" class="back-button" onclick="prevStep(4)">Back</button>
                                    <button type="button" class="next-button" onclick="nextStep(4)">Next</button>
                                </div>
                            </div>

                            <!-- Step 5 -->
                            <div class="form-step" id="step-5">
                                <h2>Step 5: Review Information</h2>
                                
                                <div class="submit-btn">
                                    <button type="button" class="back-button" onclick="prevStep(5)">Back</button>
                                    <button type="button" class="next-button" onclick="nextStep(5)">Next</button>
                                    
                                </div>
                            </div>

                            <!-- Step 6 -->
                            <div class="form-step" id="step-6">
                                
                                <h2>Step 6: Review Information</h2>
                                <p><strong>Name:</strong> <span id="review-name"></span></p>
                                <p><strong>Email:</strong> <span id="review-email"></span></p>
                                <p><strong>Address:</strong> <span id="review-address"></span></p>
                                <p><strong>Phone:</strong> <span id="review-phone"></span></p>
                                <p><strong>Account Number:</strong> <span id="review-account-number"></span></p>
                                <p><strong>Bank Name:</strong> <span id="review-bank-name"></span></p>
                                <p><strong>Payment Method:</strong> <span id="review-payment-method"></span></p>
                                <p><strong>Amount:</strong> <span id="review-amount"></span></p>
                                <div class="submit-btn">
                                   <button type="button" class="back-button" onclick="prevStep(6)">Back</button>
                                   <button type="submit" class="next-button" onclick="nextStep(6)">Submit</button>
                                </div>
                            </div>
                        </form>
                <hr>
            </div>

<!-- JavaScript -->



<script>
        let currentStep = 1;

        function nextStep(step) {
            if (step < 6) {
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

    </script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>