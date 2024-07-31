<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is authenticated and get their role
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    // If user is not authenticated, redirect to login page
    header("Location: /SUMMIT/templates/frontend/index.php");
    exit;
}

// Function to check if user is admin
function is_admin() {
    return isset($_SESSION['role']) && $_SESSION['role'] == 'admin';
}

// Get the user's first name from the session
$username = $_SESSION['username'];
$branch = $_SESSION['branch'];
$firstname = $_SESSION['firstname'];
$homeUrl = isset($_SESSION['home_url']) ? $_SESSION['home_url'] : '/SUMMIT/templates/frontend/index.php';
?>
