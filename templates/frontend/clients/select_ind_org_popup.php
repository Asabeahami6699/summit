<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Popup Example</title>

<style>
  /* Popup styles */
  .popup {
    position: fixed;
    display:none;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    z-index: 1000;
  }

  .popup-content {
    text-align: center;
  }

  /* Close button styles */
  .close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 24px;
  }

  /* Popup button styles */
  .popup-button {
    padding: 15px 30px; /* Increase button padding */
    font-size: 18px; /* Increase button font size */
    margin-bottom: 10px; /* Add margin between buttons */
    display: block; /* Display buttons as block elements */
    width: 100%; /* Set button width to 100% */
  }

  /* Background overlay styles */
  .overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
    display: none;
  }
</style>
</head>
<body>

<!-- Button to open the popup -->
<button id="openPopup">Open Popup</button>

<!-- The popup card -->
<div id="popup" class="popup">
  <div class="popup-content">
    <h2>Choose Client Type</h2>
    <button class="popup-button" onclick="window.location.href='individual.html'">Individual Clients</button>
    <button class="popup-button" onclick="window.location.href='organization.html'">Organization Clients</button>
    <!-- Close button -->
    <span class="close" onclick="closePopup()">&times;</span>
  </div>
</div>

<!-- Background overlay -->
<div id="overlay" class="overlay"></div>

<script>
  // Get the popup and overlay elements
  var popup = document.getElementById("popup");
  var overlay = document.getElementById("overlay");

  // Get the button that opens the popup
  var openPopupButton = document.getElementById("openPopup");

  // Function to open the popup
  function openPopup() {
    popup.style.display = "block";
    overlay.style.display = "block";
  }

  // Function to close the popup
  function closePopup() {
    popup.style.display = "none";
    overlay.style.display = "none";
  }

  // Event listener for the openPopupButton
  openPopupButton.addEventListener("click", openPopup);
</script>

</body>
</html>
