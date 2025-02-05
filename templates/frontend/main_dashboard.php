<div class="body_container">
    <div class="container_ofd">
        <div class="row">
            <div class="col-md-3">
                    <a href="\SUMMIT\templates\frontend\clients\client_management.php" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-user" style="font-size:35px"></i>
                            <p>Clients</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="\SUMMIT\templates\frontend\groups\group_management.php" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <i class="fa fa-users" style="font-size:35px"></i>
                            <p>Groups</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="\SUMMIT\templates\frontend\Loans\Loan_management.php" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-money-check-alt" style="font-size:35px"></i>
                            <p>Loans</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="\SUMMIT\templates\frontend\repayment1.php" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-dollar-sign" style="font-size:35px"></i>
                            <p>Repayment</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="\SUMMIT\templates\frontend\report\reportTable.php" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-chart-line" style="font-size:35px"></i>
                            <p>Reports</p>
                            
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="" class="card-link">
                    <div class="card">
                        <div class="card-body">
                            <i class="fas fa-search" style="font-size:35px"></i>
                            <p>Transfer</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="accordion-container">
        <button class="accordion">Expected payment<i class="fas fa-plus"></i></button>
        <div class="panel">
            <a href="#">Expected Repayment Today<span class="pa_count">(25)</span></a>
            <a href="#">Expected Repayment Month<span class="pa_count">(25)</span></a>
            <a href="#">Expected Repayment week<span class="pa_count">(25)</span></a>
            <a href="#">Collection Due<span class="pa_count">(25)</span></a>
        </div>
        <button class="accordion">Loans<i class="fas fa-plus"></i></button>
        <div class="panel">
            <a href="\SUMMIT\templates\frontend\Loans\Loan_status\awaiting_approvals.php">Loans awaiting approval <span class="pa_count">(25)</span></a>
            <a href="\SUMMIT\templates\frontend\Loans\Loan_status\awaiting_disbursal.php">Loans awaiting disbursal<span class="pa_count">(25)</span></a>
        </div>
        <button class="accordion">Clients<i class="fas fa-plus"></i></button>
        <div class="panel">
            <a href="#">Clients awaiting approval <span class="pa_count">(25)</span></a>
        </div>
        <button class="accordion">Groups<i class="fas fa-plus"></i></button>
        <div class="panel">
            <a href="#">Groups awaiting approval<span class="pa_count">(25)</span></a>
        </div>
    </div>
</div>
<div>
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/SUMMIT/templates/frontend/footer.php'; ?>
</div>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="../javascript/accordion.js"></script>
</body>
</html>
