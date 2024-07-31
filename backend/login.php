<?php
// Include the database connection
include '..\db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the username exists and the password matches
    $sql = "SELECT * FROM loan_officer WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the password (assuming it is hashed)
        if (password_verify($password, $row['password'])) {
            // Start a session and set session variables
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            $_SESSION['branch'] = $row['branch'];
            // Redirect to a dashboard or home page
            header("Location: dashboard.php");
            exit; // Important to prevent further execution
        } else {
            echo "Invalid password";
        }
    } else {
        echo "No user found with that username";
    }

    $stmt->close();
}

$conn->close();
?>
