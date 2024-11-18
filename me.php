<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Form Progress Bar with Navigation</title>
<style>
  /* Container for the progress bar */
  .progress-bar {
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 600px;
    margin: 50px auto;
  }

  /* Style for each step */
  .step {
    position: relative;
    flex: 1;
    padding: 10px 20px;
    background-color: #007bff;
    color: white;
    text-align: center;
    font-size: 16px;
    border-radius: 4px 0 0 4px;
    transition: background-color 0.3s ease;
  }

  /* Arrow for each step */
  .step::after {
    content: '';
    position: absolute;
    top: 50%;
    right: -10px;
    transform: translateY(-50%) rotate(45deg);
    width: 20px;
    height: 20px;
    background-color: #007bff;
    clip-path: polygon(0 0, 100% 0, 100% 100%);
    transition: background-color 0.3s ease;
    z-index: 1;
  }

  /* Hover effect to highlight current step */
  .step:hover, .step.active {
    background-color: #0056b3;
  }

  .step:hover::after, .step.active::after {
    background-color: #0056b3;
  }

  /* Remove the arrow for the last step */
  .step:last-child::after {
    display: none;
  }

  /* Optional: Add a completed state for previous steps */
  .step.completed {
    background-color: #28a745;
  }

  .step.completed::after {
    background-color: #28a745;
  }

  /* Styling for labels inside steps */
  .step-label {
    font-weight: bold;
  }

  /* Form containers for each step */
  .form-container {
    display: none;
    max-width: 600px;
    margin: 20px auto;
  }

  .form-container.active {
    display: block;
  }

  /* Navigation buttons */
  .navigation-buttons {
    display: flex;
    justify-content: space-between;
    max-width: 600px;
    margin: 20px auto;
  }

  .navigation-buttons button {
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #007bff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  .navigation-buttons button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
  }
</style>
</head>
<body>

<div class="progress-bar">
  <div class="step completed">
    <span class="step-label">Step 1</span><br>
    Personal Info
  </div>
  <div class="step">
    <span class="step-label">Step 2</span><br>
    Address Info
  </div>
  <div class="step">
    <span class="step-label">Step 3</span><br>
    Payment Info
  </div>
</div>

<!-- Forms for each step -->
<div class="form-container active" id="formStep1">
  <h3>Personal Information</h3>
  <form>
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required><br><br>
  </form>
</div>

<div class="form-container" id="formStep2">
  <h3>Address Information</h3>
  <form>
    <label for="address">Address:</label>
    <input type="text" id="address" name="address" required><br><br>
    <label for="city">City:</label>
    <input type="text" id="city" name="city" required><br><br>
    <label for="zip">ZIP Code:</label>
    <input type="text" id="zip" name="zip" required><br><br>
  </form>
</div>

<div class="form-container" id="formStep3">
  <h3>Payment Information</h3>
  <form>
    <label for="cardNumber">Card Number:</label>
    <input type="text" id="cardNumber" name="cardNumber" required><br><br>
    <label for="expiry">Expiry Date:</label>
    <input type="month" id="expiry" name="expiry" required><br><br>
    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" required><br><br>
  </form>
</div>

<div class="navigation-buttons">
  <button id="prevBtn" onclick="prevStep()">Previous</button>
  <button id="nextBtn" onclick="nextStep()">Next</button>
</div>

<script>
  let currentStep = 0;
  const steps = document.querySelectorAll('.step');
  const forms = document.querySelectorAll('.form-container');

  function updateSteps() {
    steps.forEach((step, index) => {
      if (index < currentStep) {
        step.classList.add('completed');
        step.classList.remove('active');
      } else if (index === currentStep) {
        step.classList.add('active');
        step.classList.remove('completed');
      } else {
        step.classList.remove('completed', 'active');
      }
    });

    forms.forEach((form, index) => {
      form.classList.toggle('active', index === currentStep);
    });

    document.getElementById('prevBtn').disabled = currentStep === 0;
    document.getElementById('nextBtn').disabled = currentStep === steps.length - 1;
  }

  function nextStep() {
    if (currentStep < steps.length - 1) {
      currentStep++;
      updateSteps();
    }
  }

  function prevStep() {
    if (currentStep > 0) {
      currentStep--;
      updateSteps();
    }
  }

  updateSteps();
</script>

</body>
</html>
