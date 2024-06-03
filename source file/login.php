<?php
// Start the session
session_start();

// Database connection credentials
$servername = "localhost"; // Your database server name
$db_username = "root"; // Your database username
$db_password = ""; // Your database password
$dbname = "School_Stat"; // Your database name

// Create connection
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database for the username
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Fetch the user data
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Password is correct, set session variables
            $_SESSION['username'] = $username;

            // Redirect to a protected page
            header('Location: 2.html');
            exit();
        } else {
            // Invalid password
            header('Location: login.php?error=Invalid%20credentials');
            exit();
        }
    } else {
        // No user found with that username
        header('Location: login.php?error=Invalid%20credentials');
        exit();
    }
} else {
    // If the form is not submitted, redirect to the login page
    header('Location: login.php');
    exit();
}

$conn->close();
?>

