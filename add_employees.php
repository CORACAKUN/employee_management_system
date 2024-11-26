<?php

// Database connection file
require 'config.php'; 

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $job_title = $_POST['job_title'];
        $department = $_POST['department'];
        $start_date = $_POST['start_date'];
        $address = $_POST['address'];
        $contact_number = $_POST['contact_number'];
        $emergency_contact = $_POST['emergency_contact'];
        $job_history = $_POST['job_history'];
        $email = $_POST['email'];

        $stmt = $conn->prepare("INSERT INTO employees (name, job_title, department, start_date, address, contact_number, emergency_contact, job_history, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $name, $job_title, $department, $start_date, $address, $contact_number, $emergency_contact, $job_history, $email);

        if ($stmt->execute()) {
            echo "Employee added successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $conn->close();

?>