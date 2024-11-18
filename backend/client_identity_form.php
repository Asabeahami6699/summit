<?php
// Include your database connection file
include '..\db_connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $idType = $_POST['gender'];  // This corresponds to the 'idType' field
    $idNumber = $_POST['idNumber'];
    $issueDate = $_POST['issueDate'];
    $expiryDate = $_POST['expiryDate'];
    $description = $_POST['description'];

    // Validate the form data (basic validation)
    if (empty($idType) || empty($idNumber) || empty($issueDate) || empty($expiryDate)) {
        echo json_encode(['success' => false, 'message' => 'Please fill all required fields.']);
        exit;
    }

    // Prepare SQL query to insert data into the database
    $sql = "INSERT INTO client_identity (id_type, id_number, issue_date, expiry_date, description) 
            VALUES (?, ?, ?, ?, ?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters
        $stmt->bind_param("sssss", $idType, $idNumber, $issueDate, $expiryDate, $description);

        // Execute the statement
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Form submitted successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to submit form. Please try again later.']);
        }

        // Close the statement
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Error preparing the SQL query.']);
    }

    // Close the database connection
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}
?>
