<?php
session_start();

// Check if user is authenticated and get their role
if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    // If user is not authenticated, redirect to login page
    header("Location: /SUMMIT/templates/frontend/index.php");
    exit;
}



$username = $_SESSION['username'];  // Admin username
$company_id = $_SESSION['company_id'];  // Admin's company ID
$branch = $_SESSION['branch'];  // Admin's branch
$role = $_SESSION['role'];  // Admin's role

$pageTitle = 'Admin Dashboard';
include $_SERVER['DOCUMENT_ROOT'] . '/SUMMIT/templates/frontend/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Font Awesome CDN -->
    <link rel="stylesheet" type="text/css" href="../stylesheet/main_dashboard.css">
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/SUMMIT/templates/frontend/header_bar.php'; ?>
<h6 style="text-align:center; font-size:14px">Welcome, <?php echo htmlspecialchars($username); ?>! Branch: <?php echo htmlspecialchars($branch); ?></h6>
<p>Your Company ID: <?php echo htmlspecialchars($company_id); ?></p>
<?php include $_SERVER['DOCUMENT_ROOT'] . '\summit\templates\frontend\main_dashboard.php'; ?>