<?php
// Include the database connection file
include '..\..\db_connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Initialize error variable
$error = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare("SELECT username, password, role, branch, firstname FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);

    // Execute the statement
    $stmt->execute();

    // Store the result
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Bind the result variables
        $stmt->bind_result($db_username, $db_password, $role, $branch, $firstname);

        // Fetch the result
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $db_password)) {
            // Normalize and store user details in session variables
            $_SESSION['username'] = $db_username;
            $_SESSION['role'] = strtolower(trim($role));
            $_SESSION['branch'] = $branch;
            $_SESSION['firstname'] = $firstname;

            // Set the home URL based on role
            switch ($_SESSION['role']) {
                case 'admin':
                    $_SESSION['home_url'] = "\SUMMIT\Admin\Admin_dashboard.php";
                    break;
                case 'loan_officer':
                    $_SESSION['home_url'] = "\SUMMIT\loan_officer\officer_dashborad.php";
                    break;
                case 'audit':
                    $_SESSION['home_url'] = "\SUMMIT\audit\audit_dashborad.php";
                    break;
                default:
                    $error = "Invalid role!";
                    break;
            }

            // Redirect based on user role if no error
            if (empty($error)) {
                header("Location: " . $_SESSION['home_url']);
                exit();
            }
        } else {
            // Invalid password
            $error = "Invalid username or password!";
        }
    } else {
        // Invalid username or password
        $error = "Invalid username or password!";
    }

    // Close the statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="/SUMMIT/stylesheet/loginstyle.css">
</head>
<body>
    <div class="login-card">
        <img src="/SUMMIT/image/smc.png" alt="Logo" class="logo">
        <h2>Login</h2>
        
        <?php if ($error != ""): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="input-container">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required>
            </div>
            <div class="input-container">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required>
            </div>
            <input type="submit" value="Login">
        </form>
    </div>
</body>
</html>
