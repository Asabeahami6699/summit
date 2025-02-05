<?php
// Start the session
session_start();

// Include database connection file
include '../db_connection.php'; // Adjust the path as needed

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Extract POST data
    $data = [
        'firstName' => $_POST['firstName'] ?? null,
        'lastName' => $_POST['lastName'] ?? null,
        'gender' => $_POST['gender'] ?? null,
        'mobilePhone' => $_POST['mobilePhone'] ?? null,
        'externalId' => $_POST['externalId'] ?? null,
        'dateOfBirth' => $_POST['dateOfBirth'] ?? null,
        'placeOfBirth' => $_POST['placeOfBirth'] ?? null,
        'nationality' => $_POST['nationality'] ?? null,
        'email' => $_POST['email'] ?? null,
        'streetAddress' => $_POST['streetAddress'] ?? null,
        'city' => $_POST['city'] ?? null,
        'state' => $_POST['state'] ?? null,
        'country' => $_POST['country'] ?? null,
        'digitalAddress' => $_POST['digitalAddress'] ?? null,
        'latitude' => $_POST['latitude'] ?? null,
        'longitude' => $_POST['longitude'] ?? null,
        'landmark' => $_POST['landmark'] ?? null,
        'maritalStatus' => $_POST['maritalStatus'] ?? null,
        'spouseName' => $_POST['spouseName'] ?? null,
        'spouseDateOfBirth' => $_POST['spouseDateOfBirth'] ?? null,
        'spouseOccupation' => $_POST['spouseOccupation'] ?? null,
        'spousePhone' => $_POST['spousePhone'] ?? null,
        'spouseEmployerName' => $_POST['spouseEmployerName'] ?? null,
        'spouseEmployerAddress' => $_POST['spouseEmployerAddress'] ?? null,
        'spouseEmployerPhone' => $_POST['spouseEmployerPhone'] ?? null,
        'spouseEmployerTown' => $_POST['spouseEmployerTown'] ?? null,
        'familySize' => $_POST['familySize'] ?? null,
        'numberOfDependents' => $_POST['numberOfDependents'] ?? null,
        'numberOfChildren' => $_POST['numberOfChildren'] ?? null,
        'religion' => $_POST['religion'] ?? null,
        'placeOfWorship' => $_POST['placeOfWorship'] ?? null,
        'townOfWorship' => $_POST['townOfWorship'] ?? null,
        'clientImage' => $_POST['clientImage'] ?? null,
        'tenantPropertyOwner' => $_POST['tenantPropertyOwner'] ?? null
    ];

    // Start a database transaction
    $conn->begin_transaction();

    try {
        // Extract companyId from session with a default fallback value 'LMS003'
        $company_id = $_SESSION['companyId'] ?? 'LMS003';

        // Check if company_id is null or empty and throw an exception if needed
        if ($company_id === 'LMS003') {
            // Optionally log this or handle it if needed
            // Example: log the default being used
            // error_log('Using default company_id LMS003 because session companyId is not found');
        } elseif (!$company_id) {
            throw new Exception('Company ID not found in session');
        }

        // Insert into client_Clients
        $clientQuery = "INSERT INTO client_clients (
            company_id, first_name, last_name, gender, mobile_phone, external_id, date_of_birth, place_of_birth, nationality,
            email, street_address, city, state, country, digital_address, latitude, longitude, landmark, marital_status,
            spouse_name, spouse_date_of_birth, spouse_occupation, spouse_phone, spouse_employer_name, spouse_employer_address,
            spouse_employer_phone, spouse_employer_town, family_size, number_of_dependents, number_of_children, religion,
            place_of_worship, town_of_worship, client_image, tenant_property_owner
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($clientQuery);
        $stmt->bind_param('sssssssssssssssssssssssssssssssssss', 
            $company_id,                               // Variable 1
            $data['firstName'],                        // Variable 2
            $data['lastName'],                         // Variable 3
            $data['gender'],                           // Variable 4
            $data['mobilePhone'],                      // Variable 5
            $data['externalId'],                       // Variable 6
            $data['dateOfBirth'],                      // Variable 7
            $data['placeOfBirth'],                     // Variable 8
            $data['nationality'],                      // Variable 9
            $data['email'],                            // Variable 10
            $data['streetAddress'],                    // Variable 11
            $data['city'],                             // Variable 12
            $data['state'],                            // Variable 13
            $data['country'],                          // Variable 14
            $data['digitalAddress'],                   // Variable 15
            $data['latitude'],                         // Variable 16
            $data['longitude'],                        // Variable 17
            $data['landmark'],                         // Variable 18
            $data['maritalStatus'],                    // Variable 19
            $data['spouseName'],                       // Variable 20
            $data['spouseDateOfBirth'],                // Variable 21
            $data['spouseOccupation'],                 // Variable 22
            $data['spousePhone'],                      // Variable 23
            $data['spouseEmployerName'],               // Variable 24
            $data['spouseEmployerAddress'],            // Variable 25
            $data['spouseEmployerPhone'],              // Variable 26
            $data['spouseEmployerTown'],               // Variable 27
            $data['familySize'],                       // Variable 28
            $data['numberOfDependents'],               // Variable 29
            $data['numberOfChildren'],                 // Variable 30
            $data['religion'],                         // Variable 31
            $data['placeOfWorship'],                   // Variable 32
            $data['townOfWorship'],                    // Variable 33
            $data['clientImage'],                      // Variable 34
            $data['tenantPropertyOwner']               // Variable 35
        );
        $stmt->execute();
        $clientId = $stmt->insert_id; // Get the client_id after insertion

        // Insert into client_EmploymentDetails
        if (!empty($_POST['employmentDetails'])) {
            $employmentDetails = $_POST['employmentDetails'];
            $businessOwnerEmployee = $employmentDetails['businessOwnerEmployee'];
            $employmentType = $employmentDetails['employmentType'];
            $income = $employmentDetails['income'];

            $employmentQuery = "INSERT INTO client_employmentDetails (
                client_id, business_owner_employee, employment_type, income
            ) VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($employmentQuery);
            $stmt->bind_param('isss', $clientId, $businessOwnerEmployee, $employmentType, $income);
            $stmt->execute();
            $stmt->close();
        }

        // Insert into client_GroupMemberships
        if (!empty($_POST['groupMemberships'])) {
            foreach ($_POST['groupMemberships'] as $groupMembership) {
                $groupName = $groupMembership['groupName'];
                $clientRoleInGroup = $groupMembership['clientRoleInGroup'];

                $groupQuery = "INSERT INTO client_groupMemberships (
                    client_id, group_name, client_role_in_group
                ) VALUES (?, ?, ?)";

                $stmt = $conn->prepare($groupQuery);
                $stmt->bind_param('iss', $clientId, $groupName, $clientRoleInGroup);
                $stmt->execute();
                $stmt->close();
            }
        }

        // Insert into client_branch
        if (!empty($_POST['branch'])) {
            $branch = $_POST['branch'];
            $loanOfficer = $branch['loanOfficer'];
            $branchName = $branch['branchName'];
            $submissionDate = $branch['submissionDate'];

            $branchQuery = "INSERT INTO client_branch (
                client_id, loan_officer, branch_name, submission_date
            ) VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($branchQuery);
            $stmt->bind_param('isss', $clientId, $loanOfficer, $branchName, $submissionDate);
            $stmt->execute();
            $stmt->close();
        }

        // Insert into client_Identifications
        if (!empty($_POST['identifications'])) {
            $identifications = $_POST['identifications'];
            foreach ($identifications as $identification) {
                $identificationType = $identification['identificationType'];
                $identificationNumber = $identification['identificationNumber'];

                $identificationQuery = "INSERT INTO client_identifications (
                    client_id, identification_type, identification_number
                ) VALUES (?, ?, ?)";

                $stmt = $conn->prepare($identificationQuery);
                $stmt->bind_param('iss', $clientId, $identificationType, $identificationNumber);
                $stmt->execute();
                $stmt->close();
            }
        }

        // Insert into client_BusinessDetails
        if (!empty($_POST['businessDetails'])) {
            $businessDetails = $_POST['businessDetails'];
            $businessName = $businessDetails['businessName'];
            $natureOfBusiness = $businessDetails['natureOfBusiness'];
            $businessStructure = $businessDetails['businessStructure'];
            $businessStartedDate = $businessDetails['businessStartedDate'];
            $businessPhone = $businessDetails['businessPhone'];
            $businessIncomeLevel = $businessDetails['businessIncomeLevel'];
            $businessAddress = $businessDetails['businessAddress'];
            $businessTown = $businessDetails['businessTown'];

            $businessQuery = "INSERT INTO client_businessDetails (
                client_id, business_name, nature_of_business, business_structure, business_started_date,
                business_phone, business_income_level, business_address, business_town
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($businessQuery);
            $stmt->bind_param('issssssss', $clientId, $businessName, $natureOfBusiness, $businessStructure,
                $businessStartedDate, $businessPhone, $businessIncomeLevel, $businessAddress, $businessTown);
            $stmt->execute();
            $stmt->close();
        }

        // Commit the transaction
        $conn->commit();

        // Return success response
        echo json_encode(['status' => 'success', 'message' => 'Data inserted successfully']);
    } catch (Exception $e) {
        // Rollback the transaction if something goes wrong
        $conn->rollback();
        // Return error response
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
}
?>
