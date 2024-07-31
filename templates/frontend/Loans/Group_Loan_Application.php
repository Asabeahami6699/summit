<?php
$pageTitle = isset($pageTitle) ? $pageTitle : 'Group Loan Application';
?>
<?php include '..\..\frontend\navbar.php' ;
include '..\..\frontend\header_Bar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Individual Clients Registration</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/SUMMIT/stylesheet/clients/individual_clients.css">
</head>
<body>
    <div class="wrappers">
    <div class="indC_container">
        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
        <div class="indC-tabs">
            <button class="indC-tablink" data-tab="indC-branchInfo" onclick="openTab('indC-branchInfo', this)">Branch Info</button>
            <button class="indC-tablink" data-tab="indC-clientDetails" onclick="openTab('indC-clientDetails', this)">Client Details</button>
            <button class="indC-tablink" data-tab="indC-identification" onclick="openTab('indC-identification', this)">Identification</button>
            <button class="indC-tablink" data-tab="indC-employment" onclick="openTab('indC-employment', this)">Employment</button>
            <button class="indC-tablink" data-tab="indC-beneficially" onclick="openTab('indC-beneficially', this)">Beneficially</button>
            <button class="indC-tablink" data-tab="indC-preview" onclick="openTab('indC-preview', this); showPreview();">Preview</button>
        </div>

        <form id="registrationForm" action="/submit-form" method="POST">
            <div id="indC-branchInfo" class="indC-tabcontent">
                <fieldset>
                    <legend>Branch Info</legend>
                    <div class="fields">
                        <div class="input-field">
                            <label for="branchName">Branch Name:</label>
                            <input type="text" id="branchName" name="branchName" placeholder="Please Select Branch" required>
                           </div>
                            <div class="input-field">
                            <label for="branchLocation">Branch Location:</label>
                            <input type="text" id="branchLocation" name="branchLocation" required>
                        </div>
                        <div class="input-field">
                            <label for="branchAddress">Branch Address:</label>
                            <input type="text" id="branchAddress" name="branchAddress" required>
                        </div>
                        <div class="input-field">
                            <label for="branchManager">Branch Manager:</label>
                            <input type="text" id="branchManager" name="branchManager" required>
                        </div>
                        <div class="input-field">
                            <label for="branchNumber">Branch Number:</label>
                            <input type="text" id="branchNumber" name="branchNumber" required>
                        </div>
                        <div class="input-field">
                            <label for="branchCode">Branch Code:</label>
                            <input type="text" id="branchCode" name="branchCode" required>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div id="indC-clientDetails" class="indC-tabcontent">
                <fieldset>
                    <legend>Client Details</legend>
                    <div class="fields">
                        <div class="input-field">
                            <label for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div class="input-field">
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div id="indC-identification" class="indC-tabcontent">
                <fieldset>
                    <legend>Identification</legend>
                    <div class="fields">
                        <div class="input-field">
                            <label for="idNumber">ID Number:</label>
                            <input type="text" id="idNumber" name="idNumber" required>
                        </div>
                        <div class="input-field">
                            <label for="passportNumber">Passport Number:</label>
                            <input type="text" id="passportNumber" name="passportNumber">
                        </div>
                    </div>
                </fieldset>
            </div>

            <div id="indC-employment" class="indC-tabcontent">
                <fieldset>
                    <legend>Employment</legend>
                    <div class="fields">
                        <div class="input-field">
                            <label for="jobTitle">Job Title:</label>
                            <input type="text" id="jobTitle" name="jobTitle">
                        </div>
                        <div class="input-field">
                            <label for="companyName">Company Name:</label>
                            <input type="text" id="companyName" name="companyName">
                        </div>
                    </div>
                </fieldset>
            </div>

            <div id="indC-beneficially" class="indC-tabcontent">
                <fieldset>
                    <legend>Beneficially</legend>
                    <div class="fields">
                        <div class="input-field">
                            <label for="beneficiallyName">Beneficially Name:</label>
                            <input type="text" id="beneficiallyName" name="beneficiallyName">
                        </div>
                        <div class="input-field">
                            <label for="relation">Relation:</label>
                            <input type="text" id="relation" name="relation">
                        </div>
                    </div>
                </fieldset>
            </div>

            <div id="indC-preview" class="indC-tabcontent">
                <fieldset>
                    <legend>Preview Section</legend>
                    <div id="previewContent" class="preview-grid"></div>
                    <div class="indC-navigation-buttons">
                        <button type="submit">Submit</button>
                    </div>
                </fieldset>
            </div>
        </form>

        <div class="indC-navigation-buttons">
            <button onclick="prevTab()">Back</button>
            <button onclick="nextTab()">Next</button>
        </div>
    </div>
    </div>
    <script src="\SUMMIT\javascript\individual_clients_form.js"></script>
</body>
</html>
