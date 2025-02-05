<?php
// Example of how to retrieve the submitted form data

$company_id = $_POST['company_id'];
$loan_category = $_POST['loan_category'];
$loan_amount = $_POST['loan_amount'];
$loan_term = $_POST['loan_term'];
$repayment_frequency = $_POST['repayment_frequency'];
$interest_rate = $_POST['interest_rate'];
$first_repayment_date = $_POST['first_repayment_date'];
$external_id = $_POST['external_id'];

$branch_name = $_POST['branch_name'];
$loan_officer = $_POST['loan_officer'];
$loan_purpose = $_POST['loan_purpose'];
$grace_period_principal = $_POST['grace_period_principal'];
$grace_period_interest = $_POST['grace_period_interest'];
$submission_date = $_POST['submission_date'];
$disbursement_date = $_POST['disbursement_date'];

$collateral_type = $_POST['collateral_type'];
$collateral_value = $_POST['collateral_value'];
$collateral_document = $_POST['collateral_document'];
$collateral_description = $_POST['collateral_description'];

$processing_fee = $_POST['processing_fee'];
$maintenance_fee = $_POST['maintenance_fee'];
$other_fee = $_POST['other_fee'];
$loan_default = $_POST['loan_default'];
$late_payment = $_POST['late_payment'];

$guarantors = json_decode($_POST['guarantors_data']);
$repayments = json_decode($_POST['repayment_data']);

// Now you can insert this data into your database tables
?>
