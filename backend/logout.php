<?php
// Start session
session_start();

// Check user role and set the appropriate redirection URL
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        $redirectUrl = '/summit/Admin/admin_Login.php';
    } else if ($_SESSION['role'] === 'loan_officer') {
        $redirectUrl = '/summit/Templates/frontend/index.php';
    } else {
        $redirectUrl = '/summit/Templates/frontend/index.php'; // Default redirection
    }
} else {
    // If no user role is set, redirect to default page
    $redirectUrl = '/summit/Templates/frontend/indexs.php';
}

// Destroy all session data
session_unset();
session_destroy();

// Redirect to the determined URL
header("Location: $redirectUrl");
exit();
?>
