<?php
// Show errors while testing
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include required files
include 'helpers/connection.php';
include 'helpers/insert_helper.php';

// Collect form data
$data = [
    'enrollment_id' => $_POST['enrollment_id'] ?? '',
    'reg_number' => $_POST['reg_number'] ?? '',
    'surname' => $_POST['surname'] ?? '',
    'first_name' => $_POST['first_name'] ?? '',
    'middle_name' => $_POST['middle_name'] ?? '',
    'dob' => $_POST['dob'] ?? '',
    'gender' => $_POST['gender'] ?? '',
    'marital_status' => $_POST['marital_status'] ?? '',
    'nationality' => $_POST['nationality'] ?? '',
    'email' => $_POST['email'] ?? '',
    'phone' => $_POST['phone'] ?? '',
    'state_of_origin' => $_POST['state_of_origin'] ?? '',
    'lga' => $_POST['lga'] ?? '',
    'matric_no' => $_POST['matric_no'] ?? '', 
    'department' => $_POST['department'] ?? '',
    'address' => $_POST['address'] ?? '',
    'religion' => $_POST['religion'] ?? ''
];

// Handle passport upload
$passportContent = null;
if (isset($_FILES["passport"]) && $_FILES["passport"]["error"] == 0) {
    $passportContent = addslashes(file_get_contents($_FILES["passport"]["tmp_name"]));
}

// Insert into database
$result = insertStudent($conn, $data, $passportContent);

// Show result
if ($result === true) {
    header("Location:inapp.html");
    exit();
} 
?>