<?php 
$pageTitle = 'Client management';
include '../navbar.php';
include '../header_bar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><h1><?php echo $pageTitle; ?></h1></title>
    <link rel="stylesheet" href="../../../stylesheet/clients/client_management.css">
</head>
<body>
    <div class="cm_container">
        <div class="cm_main">
            <aside class="cm_sidebar">      
            <div class="search-container">
                <input type="text" id="cm_search" placeholder="Search...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>

                <h2>Clients</h2>
                <div class="cm_client-type">
                    <a href="\summit\templates\frontend\groups\individual_client_registration.php"><h4>Individual Clients</h4></a>
                </div>
                <div class="cm_client-type">
                    <a href="#"><h4>Organization Clients</h4></a>
                </div>
            </aside>
            <section class="cm_client-list">
                <h2>Client List</h2>
                <div class="cm_client-status">
                    <a href="\summit\templates\frontend\clients\client_status\active_clients.php">🟩 Active Clients</a>
                    <span class="cm_count">(25)</span>
                </div>
                <div class="cm_client-status">
                    <a href="\summit\templates\frontend\clients\client_status\pending_clients.php">🟨 Pending Clients</a>
                    <span class="cm_count">(5)</span>
                </div>
                <div class="cm_client-status">
                    <a href="\summit\templates\frontend\clients\client_status\rejected_clients.php">🟥 Rejected Clients</a>
                    <span class="cm_count">(2)</span>
                </div>
                <div class="cm_client-status">
                    <a href="\summit\templates\frontend\clients\client_status\withdrawn_client.php">🟫 Withdrawn Clients</a>
                    <span class="cm_count">(3)</span>
                </div>
                <div class="cm_client-status">
                    <a href="\summit\templates\frontend\clients\client_status\closed_clients.php">⬛Closed Client Accounts</a>
                    <span class="cm_count">(4 from database)</span>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
