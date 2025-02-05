<?php
// Include the insertion script

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'backend/submit_client_details.php';


// Mock POST data
$_POST = [
    'firstName' => 'John',
    'lastName' => 'Doe',
    'gender' => 'Male',
    'mobilePhone' => '1234567890',
    'externalId' => 'EX12345',
    'dateOfBirth' => '1990-01-01',
    'placeOfBirth' => 'Accra',
    'nationality' => 'Ghanaian',
    'email' => 'john.doe@example.com',
    'streetAddress' => '123 Street Name',
    'city' => 'Accra',
    'state' => 'Greater Accra',
    'country' => 'Ghana',
    'digitalAddress' => 'GA-123-4567',
    'latitude' => '5.6037',
    'longitude' => '-0.1870',
    'landmark' => 'Near Mall',
    'maritalStatus' => 'Single',
    'familySize' => 4,
    'numberOfDependents' => 2,
    'numberOfChildren' => 2,
    'religion' => 'Christianity',
    'placeOfWorship' => 'Local Church',
    'townOfWorship' => 'Accra',
    'tenantPropertyOwner' => 'Tenant',
    'employmentDetails' => [
        'businessOwnerEmployee' => 'Employee',
        'employmentType' => 'Full-Time',
        'income' => 2500
    ],
    'groupMemberships' => [
        ['groupName' => 'Savings Group', 'clientRoleInGroup' => 'Member']
    ],
    'branch' => [
        'loanOfficer' => 'Jane Smith',
        'branchName' => 'Main Branch',
        'submissionDate' => date('Y-m-d')
    ],
    'identifications' => [
        ['idType' => 'Passport', 'idNumber' => 'P123456789', 'issueDate' => '2015-01-01', 'expiryDate' => '2025-01-01', 'description' => 'Primary ID']
    ],
    'businessDetails' => [
        'businessName' => 'Doe Ventures',
        'natureOfBusiness' => 'Retail',
        'businessStructure' => 'Sole Proprietor',
        'businessStartedDate' => '2010-06-15',
        'businessPhone' => '0987654321',
        'businessIncomeLevel' => 5000,
        'businessAddress' => '456 Business Street',
        'businessTown' => 'Tema',
        'businessRegion' => 'Greater Accra',
        'businessLocation' => 'Market Area'
    ],
    'beneficiaries' => [
        ['beneficiaryName' => 'Jane Doe', 'relationship' => 'Spouse', 'phoneNumber' => '1234567890', 'email' => 'jane.doe@example.com']
    ]
];

// Mock session data
$_SESSION['companyId'] = 'COMP123';

// Call the script
require  'backend/submit_client_details.php';
// Replace with the path to your actual script
?>
