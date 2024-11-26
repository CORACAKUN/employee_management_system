<?php

    require 'config.php';

    $result = $conn->query("SELECT employee_id, name, job_title, department, contact_number FROM employees");

    echo "<table border='1'>
    <tr>
        <th>Name</th>
        <th>Job Title</th>
        <th>Department</th>
        <th>Contact Number</th>
    </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>" . htmlspecialchars($row['name']) . "</td>
            <td>" . htmlspecialchars($row['job_title']) . "</td>
            <td>" . htmlspecialchars($row['department']) . "</td>
            <td>" . htmlspecialchars($row['contact_number']) . "</td>
        </tr>";
    }
    echo "</table>";

    $conn->close();

?>