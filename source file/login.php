<?php
session_start();

$servername = "localhost"; 
$db_username = "root"; 
$db_password = ""; 
$dbname = "School_Stat"; 

$conn = new mysqli($servername, $db_username, $db_password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if (password_verify($password, $hashedPassword)) {
            $_SESSION['username'] = $username;

            header('Location: 2.html');
            exit();
        } else {
            header('Location: login.php?error=Invalid%20credentials');
            exit();
        }
    } else {
        header('Location: login.php?error=Invalid%20credentials');
        exit();
    }
} else {
    header('Location: login.php');
    exit();
}

$conn->close();
?>

