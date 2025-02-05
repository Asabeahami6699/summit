<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "try";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];

    // Start a transaction
    $conn->begin_transaction();

    try {
        // Insert into userTable
        $sqlUser = "INSERT INTO userTable (fullName, email, phone) VALUES (?, ?, ?)";
        $stmtUser = $conn->prepare($sqlUser);
        $stmtUser->bind_param("sss", $fullName, $email, $phone);

        if (!$stmtUser->execute()) {
            throw new Exception("Error inserting into userTable: " . $stmtUser->error);
        }

        // Get the last inserted ID for the user
        $userId = $conn->insert_id;

        // Insert into userAddressTable
        $sqlAddress = "INSERT INTO userAddressTable (userId, address, city) VALUES (?, ?, ?)";
        $stmtAddress = $conn->prepare($sqlAddress);
        $stmtAddress->bind_param("iss", $userId, $address, $city);

        if (!$stmtAddress->execute()) {
            throw new Exception("Error inserting into userAddressTable: " . $stmtAddress->error);
        }

        // Commit transaction
        $conn->commit();
        echo "<p style='color: green;'>Data successfully inserted into both tables!</p>";
    } catch (Exception $e) {
        // Rollback transaction on error
        $conn->rollback();
        echo "<p style='color: red;'>Transaction failed: " . $e->getMessage() . "</p>";
    }

    $stmtUser->close();
    $stmtAddress->close();
    $conn->close();
} else {
    echo "<p style='color: red;'>Invalid request.</p>";
}
?>
