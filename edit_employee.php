<?php
require 'config.php';

if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];
    $result = $conn->query("SELECT * FROM employees WHERE employee_id = $employee_id");

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
    } else {
        echo "Employee not found!";
        exit;
    }
} else {
    echo "Invalid Request!";
    exit;
}

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

    $stmt = $conn->prepare("UPDATE employees SET name=?, job_title=?, department=?, start_date=?, address=?, contact_number=?, emergency_contact=?, job_history=?, email=? WHERE employee_id=?");
    $stmt->bind_param("sssssssssi", $name, $job_title, $department, $start_date, $address, $contact_number, $emergency_contact, $job_history, $email, $employee_id);

    if ($stmt->execute()) {
        echo "Employee updated successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <div class="container">
        <h2>Edit Employee</h2>
        <form action="" method="post" class="employee-form">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($employee['name']) ?>" required>

            <label for="job_title">Job Title:</label>
            <input type="text" name="job_title" id="job_title" value="<?= htmlspecialchars($employee['job_title']) ?>"
                required>

            <label for="department">Department:</label>
            <input type="text" name="department" id="department"
                value="<?= htmlspecialchars($employee['department']) ?>" required>

            <label for="start_date">Start Date:</label>
            <input type="date" name="start_date" id="start_date"
                value="<?= htmlspecialchars($employee['start_date']) ?>" required>

            <label for="address">Address:</label>
            <textarea name="address" id="address"><?= htmlspecialchars($employee['address']) ?></textarea>

            <label for="contact_number">Contact Number:</label>
            <input type="text" name="contact_number" id="contact_number"
                value="<?= htmlspecialchars($employee['contact_number']) ?>">

            <label for="emergency_contact">Emergency Contact:</label>
            <input type="text" name="emergency_contact" id="emergency_contact"
                value="<?= htmlspecialchars($employee['emergency_contact']) ?>">

            <label for="job_history">Job History:</label>
            <textarea name="job_history" id="job_history"><?= htmlspecialchars($employee['job_history']) ?></textarea>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?= htmlspecialchars($employee['email']) ?>" required>

            <button type="submit">Update Employee</button>
        </form>
    </div>
</body>

</html>