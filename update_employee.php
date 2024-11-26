<?php

    require 'config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $employee_id = $_POST['employee_id'];
        $name = $_POST['name'];
        $job_title = $_POST['job_title'];
        $department = $_POST['department'];
        $start_date = $_POST['start_date'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $emergency_contact = $_POST['emergency_contact'];
        $job_history = $_POST['job_history'];
        $email = $_POST['email'];

        $stmt = $conn->prepare("UPDATE employees SET name = ?, job_title = ?, department = ?, start_date = ?, address = ?, contact_number = ?, emergency_contact = ?, job_history = ?, email = ? WHERE employee_id = ?");
        $stmt->bind_param("sssssssssi", $name, $job_title, $department, $start_date, $address, $contact_number, $emergency_contact, $job_history, $email, $employee_id);

        if ($stmt->execute()) {
            echo "Employee updated successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $conn->close();
    
?>