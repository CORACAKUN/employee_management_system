<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <main>
        <section class="container">
            <h2>Add New Employee</h2>
            <form action="add_employees.php" method="post" class="employee-form">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>

                <label for="job_title">Job Title:</label>
                <input type="text" name="job_title" id="job_title" required>

                <label for="department">Department:</label>
                <input type="text" name="department" id="department" required>

                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" id="start_date" required>

                <label for="address">Address:</label>
                <textarea name="address" id="address"></textarea>

                <label for="contact_number">Contact Number:</label>
                <input type="text" name="contact_number" id="contact_number">

                <label for="emergency_contact">Emergency Contact:</label>
                <input type="text" name="emergency_contact" id="emergency_contact">

                <label for="job_history">Job History:</label>
                <textarea name="job_history" id="job_history"></textarea>

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <button type="submit">Add Employee</button>
            </form>


        </section>

        <section class="employee-table">
            <!-- Employee Table -->
            <h2>Employee Directory</h2>
            <table class="employee-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Job Title</th>
                        <th>Department</th>
                        <th>Contact Number</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require 'config.php';

                        $result = $conn->query("SELECT employee_id, name, job_title, department, contact_number FROM employees");

                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                                <td>" . htmlspecialchars($row['name']) . "</td>
                                <td>" . htmlspecialchars($row['job_title']) . "</td>
                                <td>" . htmlspecialchars($row['department']) . "</td>
                                <td>" . htmlspecialchars($row['contact_number']) . "</td>
                                <td>
                                    <a href='edit_employee.php?id=" . $row['employee_id'] . "' class='edit-btn'>Edit</a>
                                    <a href='delete_employee.php?id=" . $row['employee_id'] . "' class='delete-btn' onclick='return confirm(\"Are you sure you want to delete this employee?\");'>Delete</a>
                                </td>
                            </tr>";
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>