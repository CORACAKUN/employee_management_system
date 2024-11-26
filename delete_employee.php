<?php
require 'config.php';

if (isset($_GET['id'])) {
    $employee_id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM employees WHERE employee_id = ?");
    $stmt->bind_param("i", $employee_id);

    if ($stmt->execute()) {
        echo "Employee deleted successfully!";
    } else {
        echo "Error deleting employee: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
    header("Location: index.php");
    exit;
} else {
    echo "Invalid request!";
}
?>