<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrollment</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Student Enrollment</h1>
    <div id="form">
        <form action="insert.php" method="POST">
            <label for="first_name">First Name:</label><br>
            <input type="text" id="first_name" name="first_name" required><br>
            <label for="last_name">Last Name:</label><br>
            <input type="text" id="last_name" name="last_name" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <label for="course">Course:</label><br>
            <input type="text" id="course" name="course" required><br>
            <label for="enrollment_date">Enrollment Date:</label><br>
            <input type="date" id="enrollment_date" name="enrollment_date" required><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
    <div id="students">
        <?php
        include 'db_connect.php';

        $sql = "SELECT * FROM students";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Course</th><th>Enrollment Date</th></tr>';
            while($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["id"] . '</td>';
                echo '<td>' . $row["first_name"] . '</td>';
                echo '<td>' . $row["last_name"] . '</td>';
                echo '<td>' . $row["email"] . '</td>';
                echo '<td>' . $row["course"] . '</td>';
                echo '<td>' . $row["enrollment_date"] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "0 results";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>