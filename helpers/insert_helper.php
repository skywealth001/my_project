<?php
function insertStudent($conn, $data, $passportContent) {
$stmt = $conn->prepare("INSERT INTO students (
enrollment_id, passport, reg_number, surname, first_name, middle_name, dob, gender,
marital_status, nationality, email, phone, state_of_origin, lga, matric_no,
department, `address`, religion
) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if (!$stmt) {
return "SQL error: " . $conn->error;
}


$stmt->bind_param("ssssssssssssssssss",
$data['enrollment_id'], $passportContent, $data['reg_number'], $data['surname'],
$data['first_name'], $data['middle_name'], $data['dob'], $data['gender'],
$data['marital_status'], $data['nationality'], $data['email'], $data['phone'],
$data['state_of_origin'], $data['lga'], $data['matric_no'], $data['department'],
$data['address'], $data['religion']
);

if ($stmt->execute()) {
return true;
} else {
return $stmt->error;
}

$stmt->close();
}