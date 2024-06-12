<?php
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "school_stat";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$first_name = $_POST['first_name'];
$student_index = $_POST['index'];
$grade = $_POST['grade'];
$email = $_POST['email'];

// Fetch student data
$sql = "SELECT year, math_marks, english_marks, history_marks FROM students WHERE first_name='$first_name' AND student_index='$student_index' AND grade='$grade' AND email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2 style='text-align: center; color: blue;'>Mark Sheet</h2>";
    echo "<table style='width: 50%; margin: auto; border-collapse: collapse;'>
            <tr style='background-color: #f2f2f2;'>
                <th style='border: 1px solid #ddd; padding: 8px;'>Year</th>
                <th style='border: 1px solid #ddd; padding: 8px;'>Mathematics Marks</th>
                <th style='border: 1px solid #ddd; padding: 8px;'>English Marks</th>
                <th style='border: 1px solid #ddd; padding: 8px;'>History Marks</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td style='border: 1px solid #ddd; padding: 8px;'>{$row['year']}</td>
                <td style='border: 1px solid #ddd; padding: 8px;'>{$row['math_marks']}</td>
                <td style='border: 1px solid #ddd; padding: 8px;'>{$row['english_marks']}</td>
                <td style='border: 1px solid #ddd; padding: 8px;'>{$row['history_marks']}</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p style='text-align: center; color: red;'>No results found</p>";
}

$conn->close();
?>

