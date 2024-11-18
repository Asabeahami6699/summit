<?php 
$pageTitle = 'Group management';
include '../navbar.php';
include '../header_bar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><h1><?php echo $pageTitle; ?></h1></title>
    <link rel="stylesheet" href="/SUMMIT/stylesheet/groups/group_management.css">
</head>
<body>
    <div class="cm_container">
        <div class="cm_main">
            <aside class="cm_sidebar">      
            <div class="search-container">
                <input type="text" id="cm_search" placeholder="Search...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>

                <h2>Groups</h2>
                <div class="cm_client-type">
                    <a href="\summit\templates\frontend\groups\group_registration.php"><h4>Create New Group </h4></a>
                </div>
            </aside>
            <section class="cm_client-list">
                <h2>Group List</h2>
                <div class="cm_client-status">
                    <a href="\summit\templates\frontend\groups\group_status\active_groups.php"> 🟩 Active Groups</a>
                    <span class="cm_count">(25)</span>
                </div>
                <div class="cm_client-status">
                    <a href="\summit\templates\frontend\groups\group_status\pending_groups.php">🟨 Pending Groups</a>
                    <span class="cm_count">(5)</span>
                </div>

                <div class="cm_client-status">
                    <a href="\summit\templates\frontend\groups\group_status\fullyPaid_groups.php">✅ Fully Paid Groups</a>
                    <span class="cm_count">(4 from database)</span>
                </div>
                
                <div class="cm_client-status">
                    <a href="\summit\templates\frontend\groups\group_status\closedGroupsAccounts.php">⬛ Closed Group Accounts</a>
                    <span class="cm_count">(4 from database)</span>
                </div>
            </section>
        </div>
    </div>
</body>
</html>
